<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $actividades = [
            [
                'nombre' => 'Eventos Propios',
            ],
            [
                'nombre' => 'Eventos como Invitado',
            ],
            [
                'nombre' => 'Capacitaciones Impartidas',
            ],
            [
                'nombre' => 'Trabajo Legislativo en Materia de Derechos Humanos y Perspectiva de Género',
            ],
        ];

         DB::table('actividades')->insert($actividades);
    }
}
