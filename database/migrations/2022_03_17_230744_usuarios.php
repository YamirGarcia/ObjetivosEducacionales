<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nombreUsuario');
            $table->string('contraseña');
            $table->string('rol');
            $table->string('correo');
            $table->string('telefono');
            $table->bigInteger('idDepartamento');
            $table->timestamps();

            $table->foreign('idDepartamento')->references('id')->on('Departamento');//->onDelete('cascade');
        });

        Schema::create('Evaluadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('empresa');
            $table->string('nombreUsuario');
            $table->string('contraseña');
            $table->string('correo');
            $table->string('telefono');
            $table->bigInteger('idDepartamento');
            $table->bigInteger('idGrupoDeInteres');
            $table->foreign('idDepartamento')->references('id')->on('Departamento');//->onDelete('cascade');
            $table->foreign('idGrupoDeInteres')->references('id')->on('GrupoDeInteres');//->onDelete('cascade');
        });

        Schema::create('UsuarioCarreras', function (Blueprint $table) {
            $table->bigInteger('idUsuario');
            $table->bigInteger('idCarrera');
            $table->foreign('idUsuario')->references('id')->on('Usuarios');//->onDelete('cascade');
            $table->foreign('idCarrera')->references('id')->on('Carreras');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
