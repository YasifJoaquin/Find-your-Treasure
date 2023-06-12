<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __(' ') }}
    </x-slot>

    <x-slot name="description">
        {{ __(' ') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div class="flex justify-center items-center w-4/6 h-40 mx-auto mb-5">
            @if (isset($photo))
                <div class="flex items-center justify-center">
                    <div class="w-40 h-40 mr-2">
                        <img src="{{ $photo->temporaryURL() }}" alt="" class="h-full w-full">
                    </div>
                    <div class="w-1/2">
                        <label class="w-auto h-auto cursor-pointer opacity-90 hover:opacity-100">
                            <div class="w-40 h-40 mr-2 flex items-center justify-center">
                                <input type="file" id="photo" wire:model="photo" class="hidden">
                                <img src="{{ asset('storage/profile-photos/' . auth()->user()->profile_photo_path) }}" alt="" class="h-full w-full">
                            </div>
                        </label>
                    </div>
                </div>
            @else
                <div class="w-1/2">
                    <label class="w-full h-auto cursor-pointer opacity-90 hover:opacity-100">
                        <div class="w-40 h-40 flex items-center justify-center">
                            <input type="file" id="photo" wire:model="photo" class="hidden">
                            <img src="{{ asset('storage/profile-photos/' . auth()->user()->profile_photo_path) }}" alt="" class="h-full w-full">
                        </div>
                    </label>
                </div>
            @endif
        </div>

        <!-- Name -->
        <div class="mb-3">
            <div class="inline-flex">
                <div class="flex justify-center items-center">
                    <label for="nombres" class="text-gray-300 text-2xl tracking-wider"> Nombres </label>
                </div>
                <x-input id="nombres" type="text" class="border-b-indigo-700 ml-2 block w-full" wire:model.defer="state.nombres" autocomplete="nombres" />
                <x-input-error for="nombres" />
            </div>
        </div>

        <div class="mb-3">
            <div class="inline-flex">
                
                <div class="flex justify-center items-center">
                    <label for="apellidos" class="text-gray-300 text-2xl tracking-wider"> Apellidos </label>
                </div>
                <x-input id="apellidos" type="text" class="border-b-indigo-700 ml-1 block w-full" wire:model.defer="state.apellidos" autocomplete="apellidos" />
                <x-input-error for="apellidos" />
            </div>
        </div>

        <!-- Email -->
        <div class="">
            <div class="inline-flex">
                <div class="flex justify-center items-center">
                    <label for="email" class="text-gray-300 text-2xl tracking-wider"> Correo </label>
                </div>
                <x-input id="email" type="email" class="border-b-indigo-700 ml-6 block w-full" wire:model.defer="state.email" autocomplete="username" />
                <x-input-error for="email" />
            </div>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
