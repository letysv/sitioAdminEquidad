<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjerciciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ejercicios = [
            [
                'nombre' => 'Primer Año de Ejercicio Constitucional',
            ],
            [
                'nombre' => 'Segundo Año de Ejercicio Constitucional',
            ],
            [
                'nombre' => 'Tercer Año de Ejercicio Constitucional',
            ],
        ];

         DB::table('ejercicio_legislativo')->insert($ejercicios);
    }
}
