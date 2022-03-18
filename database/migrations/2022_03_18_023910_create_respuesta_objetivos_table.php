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
        Schema::create('respuesta_objetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('respuesta');
            $table->bigInteger('idPreguntaAspectoObjetivo');
            $table->bigInteger('idEncuestaAsignada');
            $table->timestamps();
            $table->foreign('idPreguntaAspectoObjetivo')->references('id')->on('pregunta_aspecto_objetivos');//->onDelete('cascade');
            $table->foreign('idEncuestaAsignada')->references('id')->on('encuesta_asignada_objetivos');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_objetivos');
    }
};
