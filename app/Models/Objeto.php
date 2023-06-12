<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'objeto',
        'marca',
        'color',
        'ubicacion',
        'descripcion',
        'valor_sentimental',
        'estado',
        'aceptado',
        'oculto',
        'imagen',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clasificacion(): BelongsToMany
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_objetos');
    }

    public function agradecimiento(): HasMany
    {
        return $this->hasMany(Agradecimiento::class);
    }

    // ----- ACCESSORS -----
    // los Estados se mostraran como strings dependiendo el numero
    public function getEstadoAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'Perdido';
            case 2:
                return 'Encontrado';
            case 3:
                return 'Devuelto';
            case 4:
                return 'No Reclamado';
            default:
                return 'desconocido';
        }
    }

    // Mostrar los objetos en mayuscula
    public function getObjetoAttribute($value)
    {
        return strtoupper($value);
    }

    // la Marca se muestra en minuscula con la primera en mayuscula
    public function getMarcaAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // El Color se muestra en minusculas con la primera en mayuscula
    public function getColorAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // la Ubicacion se muestra en minusculas con la primera en mayuscula
    public function getUbicacionAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // la Descripcion se mostrara en minusculas con la primera letra en mayuscula
    public function getDescripcionAttribute($value)
    {
        return ucfirst(strtolower($value));
    }


    // ----- MUTATORS -----
    // la Descripcion se guardara en minusculas
    public function setObjetoAttribute($value)
    {
        $this->attributes['objeto'] = strtolower($value);
    }

    // la Descripcion se guardara en minusculas
    public function setMarcaAttribute($value)
    {
        $this->attributes['marca'] = strtolower($value);
    }

    // la Descripcion se guardara en minusculas
    public function setColorAttribute($value)
    {
        $this->attributes['color'] = strtolower($value);
    }

    // la Descripcion se guardara en minusculas
    public function setUbicacionAttribute($value)
    {
        $this->attributes['ubicacion'] = strtolower($value);
    }

    // la Descripcion se guardara en minusculas
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtolower($value);
    }
}