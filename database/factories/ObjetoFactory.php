<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objeto>
 */
class ObjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuario = User::all();
        
        return [
            'objeto'=>fake()->sentence(),
            'marca'=>fake()->sentence(),
            'color'=>fake()->randomElement(['rojo','verde','azul','amarillo','morado']),
            'ubicacion'=>fake()->randomElement(['Edificio M','Edificio N','Edificio L','Edificio E','Edificio D']),            
            'descripcion'=>fake()->paragraph(3),
            'valor_sentimental'=>fake()->numberBetween(1,5), //valor entre 1 a 5 donde 1 es menor valor y 5 es el valor maximo
            'estado'=>fake()->numberBetween(1,4), // 1.-Perdido, 2.-Encontrado, 3.-Recuperado, 4.-NoReclamado
            'user_id'=>$usuario->random()
        ];
    }
}
