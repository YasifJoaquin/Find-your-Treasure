<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Objeto;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agradecimiento>
 */
class AgradecimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all();
        $objeto = Objeto::all();
        return [
            'texto'=>fake()->paragraph(4),
            'user_id'=>$user->random(),
            'objeto_id'=>$objeto->random()
        ];
    }
}
