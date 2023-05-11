<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClasificacionObjeto extends Model
{
    use HasFactory;

    public function objeto()
    {
        return $this->belongsTo(Objeto::class);
    }

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }
}
