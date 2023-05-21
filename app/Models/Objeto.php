<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'imagen',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function clasificacion(): BelongsToMany
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_objetos');
    }

    public function agradecimiento(): HasMany
    {
        return $this->hasMany(Agradecimiento::class);
    }
}