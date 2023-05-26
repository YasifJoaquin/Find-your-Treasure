<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Objeto;
use App\Models\Clasificacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClasificacionObjeto>
 */
class ClasificacionObjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $objetos = Objeto::all();
        $clasificaciones = Clasificacion::all();

        return [
            'objeto_id'=>$objetos->random(),
            'clasificacion_id'=>$clasificaciones->random()
        ];
    }
}
