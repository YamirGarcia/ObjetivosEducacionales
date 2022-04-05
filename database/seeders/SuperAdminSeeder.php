<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


// Seeder para poder crear un usuario con todos los permisos cuando aun no se tiene ningun administrador 
// registrado en la base de datos 


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name' => 'Administrador',
            'apellido' => 'Admin',
            'telefono' => '4431111111',
            'email' => 'admin@morelia.tecnm.mx',
            'password' => bcrypt('asdf'),
            'creadopor' => 'SuperAdmin',
            'rol' => 'Administrador'
        ]);
        // Se le asignan los roles al usuario Administrador
        //Si ya se tiene creador roles se comentan las primeras tres lineas
        $rol = Role::create(['name' => 'Administrador']);
        $permisos = Permission::pluck('id', 'id')->all();
        $rol->syncPermissions($permisos);
        $usuario->assignRole([$rol->id]);
    }
}
