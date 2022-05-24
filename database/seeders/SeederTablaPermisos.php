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

            //permisos pra usuario
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //permisos para objetivos educacionales
            'ver-objetivos',
            'crear-objetivos',
            'editar-objetivos',
            'borrar-objetivos',

             //permisos para aspectos de objetivos educacionales
             'ver-aspectosObjetivos',
             'crear-aspectosObjetivos',
             'editar-aspectosObjetivos',
             'borrar-aspectosObjetivos',

             //permisos para preguntas de objetivos educacionales
             'ver-preguntasObjetivos',
             'crear-preguntasObjetivos',
             'editar-preguntasObjetivos',
             'borrar-preguntasObjetivos',

            //permisos para atributos
            'ver-atributos',
            'crear-atributos',
            'editar-atributos',
            'borrar-atributos',

            //permisos para aspectos de objetivos educacionales
            'ver-aspectosAtributos',
            'crear-aspectosAtributos',
            'editar-aspectosAtributos',
            'borrar-aspectosAtributos',

            //permisos para preguntas de objetivos educacionales
            'ver-preguntasAtributos',
            'crear-preguntasAtributos',
            'editar-preguntasAtributos',
            'borrar-preguntasAtributos',

             //permisos evaluadores
             'ver-evaluadores',
             'crear-evaluadores',
             'editar-evaluadores',
             'borrar-evaluadores',
             'visualizar-evaluadores',

             //permisos encuestas objetivos
             'ver-encuestasObjetivos',
             'crear-encuestasObjetivos',
             'editar-encuestasObjetivos',
             'borrar-encuestasObjetivos',

             //permisos encuestas atributos
             'ver-encuestasAtributos',
             'crear-encuestasAtributos',
             'editar-encuestasAtributos',
             'borrar-encuestasAtributos',

             //permisos contestar encuestas
             'contestarEncuestas',

             //permisos residentes
             'ver-residentes',
             'crear-residentes',
             'editar-residentes',
             'borrar-residentes',

             //permisos Estadisticas
             'ver-estadisticas',


        ]; 
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
