<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartadosPublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartados = [
            [
                'nombre' => 'Legislación sobre mujeres',
            ],
            [
                'nombre' => 'Documentos CEIGyDH',
            ],
        ];

         DB::table('apartados_publicaciones')->insert($apartados);
    }
}
