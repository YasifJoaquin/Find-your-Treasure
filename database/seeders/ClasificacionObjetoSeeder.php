<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ClasificacionObjeto;

class ClasificacionObjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClasificacionObjeto::factory()
            ->count(20)
            ->create()
            ;
    }
}
