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
}
