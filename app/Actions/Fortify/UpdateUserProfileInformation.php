<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

use RealRashid\SweetAlert\Facades\Alert;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */

    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable','mimes:jpg,jpeg,png','max:10240','image'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $nombreImagen = str_replace(' ', '_', $input['nombres']) . '_' . "profile_photo" . '.' . $input['photo']->extension();
            //dd($input['photo']->storeAs('public/profile-photos', $nombreImagen));
            //dd($nombreImagen);
            // $user->updateProfilePhoto($input['photo']);

            $foto_actualizada = User::findOrFail(auth()->user()->id);
            $foto_actualizada->update([
                'profile_photo_path' => $nombreImagen,
            ]);

            $rutaImagen = $input['photo']->storeAs('public/profile-photos', $nombreImagen);
            $rutaImagen = str_replace('public/', '', $rutaImagen);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);

        } else {
            $user->forceFill([
                'nombres' => $input['nombres'],
                'apellidos' => $input['apellidos'],
                'email' => $input['email'],
            ])->save();

            // Alerta de actualizacion de datos
            Alert::toast('Foto de perfil actualizada','success');
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'nombres' => $input['nombres'],
            'apellidos' => $input['apellidos'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
