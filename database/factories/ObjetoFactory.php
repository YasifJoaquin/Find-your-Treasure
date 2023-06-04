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
            'objeto'=>fake()->sentence(1,3),
            'marca'=>fake()->sentence(1),
            'color'=>fake()->randomElement(['rojo','verde','azul','amarillo','morado']),
            'ubicacion'=>fake()->randomElement(['Edificio M','Edificio N','Edificio L','Edificio E','Edificio D']),            
            'descripcion'=>fake()->paragraph(2),
            'valor_sentimental'=>fake()->numberBetween(1,5), //valor entre 1 a 5 donde 1 es menor valor y 5 es el valor maximo
            'estado'=>fake()->numberBetween(1,4), // 1.-Perdido, 2.-Encontrado, 3.-Recuperado, 4.-NoReclamado
            'oculto'=> 2, //1.- oculto simulando ser borrado por el usuaio pero no de la base de datos | 2.- no oculto y visible dentro de los objetos perdidos del usuario
            'user_id'=>$usuario->random()
        ];
    }
}
