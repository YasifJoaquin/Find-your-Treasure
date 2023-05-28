<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Objeto;
//use App\Models\Agradecimiento;

class ObjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Objeto::factory()
            ->count(10)
            //->hasAgradecimientos(3)
            ->create()
        ;
    }
}
