<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Carbon\Carbon;

class Agradecimiento extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function objeto(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ----- ACCESORS -----
    // El agradecimiento se mostrara en minusculas con la primera letra en mayuscula
    public function getTextoAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // Si se llegase a mostrar la fecha se da formato que se puede leer
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('dddd D [de] MMMM [del] YYYY');
    }

    // ---------- MUTATORS ----------
    // la Descripcion se guardara en minusculas
    public function setTextoAttribute($value)
    {
        $this->attributes['texto'] = strtolower($value);
    }
}