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
        Schema::create('evaluadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('empresa');
            // $table->string('nombreUsuario');
            $table->string('contraseña');
            $table->string('correo');
            $table->string('telefono');
            $table->string('idDepartamento');
            $table->string('creadopor');
            $table->bigInteger('idGrupoDeInteres');
            $table->timestamps();
            $table->foreign('idGrupoDeInteres')->references('id')->on('grupo_de_interes');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluadors');
    }
};
