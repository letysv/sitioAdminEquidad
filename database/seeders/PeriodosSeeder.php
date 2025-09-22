<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periodos = [
            [
                'nombre' => 'Primer Período de Sesiones Ordinarias',
            ],
            [
                'nombre' => 'Primer Receso',
            ],
            [
                'nombre' => 'Segundo Receso',
            ],
            [
                'nombre' => 'Primer Período Extraordinario',
            ],
            [
                'nombre' => 'Segundo Período Extraordinario',
            ],
            [
                'nombre' => 'Tercer Período Extraordinario',
            ],
            [
                'nombre' => 'Cuarto Período Extraordinario',
            ],
            [
                'nombre' => 'Quinto Período Extraordinario',
            ],
            [
                'nombre' => 'Sexto Período Extraordinario',
            ],
            [
                'nombre' => 'Séptimo Período Extraordinario',
            ],
            [
                'nombre' => 'Octavo Período Extraordinario',
            ],
        ];

         DB::table('periodos')->insert($periodos);
    }
}
