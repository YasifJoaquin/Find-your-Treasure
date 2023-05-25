<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function objetos(): HasMany
    {
        return $this->hasMany(Objeto::class);
    }

    public function agradecimiento(): HasMany
    {
        return $this->hasMany(Agradecimiento::class);
    }

    // ----- ACCESSORS -----
    // Los Nombres se mostrara en minusculas con la primera letra en mayuscula
    public function getNombresAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
    // Los Apellidos se mostrara en minusculas con la primera letra en mayuscula
    public function getApellidosAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // El Correo se muestra en mayusculas
    public function getEmailAttribute($value)
    {
        return strtoupper($value);
    }

    // La Contraseña se muestra en mayusculas
    public function getPasswordAttribute($value)
    {
        return strtoupper($value);
    }

    // ----- MUTATORS -----
    // la Descripcion se guardara en minusculas
    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = strtolower($value);
    }
    // ----- MUTATORS -----
    // la Descripcion se guardara en minusculas
    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] = strtolower($value);
    }
    // ----- MUTATORS -----
    // la Descripcion se guardara en minusculas
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
