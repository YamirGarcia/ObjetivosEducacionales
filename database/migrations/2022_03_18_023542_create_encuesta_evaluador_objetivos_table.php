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
        Schema::create('encuesta_evaluador_objetivos', function (Blueprint $table) {
            $table->id();
            $table->string('estatus');
            $table->string('periodo');
            $table->bigInteger('asignadoPor');
            $table->bigInteger('evaluador');
            $table->bigInteger('idCarrera');
            $table->foreign('asignadoPor')->references('id')->on('users');
            $table->foreign('evaluador')->references('id')->on('evaluadors');
            $table->foreign('idCarrera')->references('id')->on('carreras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_evaluador_objetivos');
    }
};
