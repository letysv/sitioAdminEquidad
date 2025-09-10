<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'user_data' => [
                    'name' => 'Joel Clemente Serrano',
                    'email' => 'joel@prueba.com',
                    'password' => bcrypt('12345678')
                ],
                'role' => 'Adm-desarrollador'
            ],
            [
                'user_data' => [
                    'name' => 'Lorena Rivera Ruiz',
                    'email' => 'lorenarr@prueba.com',
                    'password' => bcrypt('123456')
                ],
                'role' => 'Adm-desarrollador'
            ],
            [
                'user_data' =>[
                    'name' => 'Leticia Sedas Vargas',
                    'email' => 'lsedas@prueba.com',
                    'password' => bcrypt('12345678')
            ],
            'role' => 'Adm-desarrollador'
            ],
        ];

        foreach ($usuarios as $usuario) {
            // User::create($usuario);
            $user = User::create($usuario['user_data']);
            $user->assignRole($usuario['role']);
        }
    }
}
