<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clasificacion>
 */
class ClasificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'etiqueta'=>fake()->randomElement(['gorra','casco','celular','llaves','sueter','llavero','cartera','credencial','reloj','lentes','usb','libreta','lapicera']),
        ];
    }
}
