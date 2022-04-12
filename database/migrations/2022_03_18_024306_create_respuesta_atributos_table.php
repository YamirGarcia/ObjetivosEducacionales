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
        Schema::create('respuesta_atributos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idPreguntaAspecto');
            $table->string('respuesta');
            $table->bigInteger('idEncuestaAsignada');
            $table->timestamps();
            
            $table->foreign('idPreguntaAspecto')->references('id')->on('pregunta_aspecto_atributos');
            $table->foreign('idEncuestaAsignada')->references('id')->on('encuesta_evaluador_atributos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_atributos');
    }
};
