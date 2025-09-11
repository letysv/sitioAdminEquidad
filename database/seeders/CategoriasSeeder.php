<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'titulo' => 'Comunicación no violenta',
            ],
            [
                'titulo' => 'Conceptos explicados con ilustraciones',
            ],
            [
                'titulo' => 'Discapacidad y feminismo',
            ],
            [
                'titulo' => 'Ecofeminismo',
            ],
            [
                'titulo' => 'Economía feminista',
            ],
            [
                'titulo' => 'Feminismo de la diferencia',
            ],
            [
                'titulo' => 'Feminismo de la igualdad',
            ],
            [
                'titulo' => 'Feminismo marxista',
            ],
            [
                'titulo' => 'Feminismo materialista',
            ],
            [
                'titulo' => 'Feminismo para niñas',
            ],
            [
                'titulo' => 'Feminismo para principiantes',
            ],
            [
                'titulo' => 'Feminismo radical',
            ],
            [
                'titulo' => 'Historia del feminismo',
            ],
            [
                'titulo' => 'La ética y el feminismo',
            ],
            [
                'titulo' => 'Maternidad feminista',
            ],
            [
                'titulo' => 'Menos machos más hombres',
            ],
            [
                'titulo' => 'Mujeres libres',
            ],
            [
                'titulo' => 'Patriarcado y machismo',
            ],
            [
                'titulo' => 'Sororidad',
            ],
            [
                'titulo' => 'Violencia',
            ],
        ];

        foreach ($categorias as $categoria) {
            Categorias::create($categoria);
        }
    }
}
