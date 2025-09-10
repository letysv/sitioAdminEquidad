<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolAdmin = Role::create(['name' => 'Administrador']);
        $rolCaptur = Role::create(['name' => 'Capturista']);
        $rolDesarrollo = Role::create(['name' => 'Adm-desarrollador']);
        
        Permission::create(['name' => 'usuarios'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'usuarios.update'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'publicaciones'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'publicaciones.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'publicaciones.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'publicaciones.update'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'publicaciones.activate'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'categorias'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'categorias.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'categorias.update'])->syncRoles([$rolDesarrollo]);
        
        Permission::create(['name' => 'biblioteca'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'biblioteca.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'biblioteca.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'biblioteca.update'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'biblioteca.activate'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'efemerides'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'efemerides.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'efemerides.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'efemerides.update'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'efemerides.activate'])->syncRoles([$rolDesarrollo]);
        
        Permission::create(['name' => 'enlaces'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'enlaces.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'enlaces.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'enlaces.update'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'enlaces.activate'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'actividades'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'actividades.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'actividades.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'actividades.update'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'actividades.activate'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'permisos'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'permisos.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'permisos.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'permisos.update'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'roles'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$rolDesarrollo]);
        Permission::create(['name' => 'roles.update'])->syncRoles([$rolDesarrollo]);

        Permission::create(['name' => 'adm-desarrollador'])->syncRoles([$rolDesarrollo]);
    }
}
