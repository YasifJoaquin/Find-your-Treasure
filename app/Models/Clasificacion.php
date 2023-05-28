<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Clasificacion extends Model
{
    use HasFactory;

    public function objeto(): BelongsToMany
    {
        return $this->belongsToMany(Objeto::class, 'clasificacion_objetos');
    }

    // ----- ACCESSOR -----
    //muestra los datos en mayuscula
    public function getEtiquetaAttribute($value)
    {
        return strtoupper($value);
    }

    // ----- MUTATOR -----
    // la Etiqueta se guardara en minusculas
    public function setEtiquetaAttribute($value)
    {
        $this->attributes['etiqueta'] = strtolower($value);
    }
}
