<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            // permisos roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            // permisos para carrera
            'ver-carrera',
            'crear-carrera',
            'editar-carrera',
            'borrar-carrera',
        ]; 
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
