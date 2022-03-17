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
        Schema::create('NumeroEncuestaAtributos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('idCarrera');
            $table->foreign('idCarrera')->references('id')->on('Carreras');//->onDelete('cascade');
        });

        Schema::create('EncuestaAtributos', function (Blueprint $table) {
            $table->bigInteger('idEncuestaAtributos');
            $table->bigInteger('idAtributo');
            $table->foreign('idEncuestaAtributos')->references('id')->on('NumeroEncuestaAtributos');//->onDelete('cascade');
            $table->foreign('idAtributo')->references('id')->on('Atributos');//->onDelete('cascade');
        });

        Schema::create('PreguntasAspectosAtributos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Pregunta');
            $table->bigInteger('idAspectoAtributo');
            $table->foreign('idAspectoAtributo')->references('id')->on('AspectosAtributos');//->onDelete('cascade');

        });

        Schema::create('EncuestaAsignadaAtributos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periodo');
            $table->bigInteger('idEvaluador');
            $table->bigInteger('idNumeroEncuestaAtributos');
            $table->foreign('idEvaluador')->references('id')->on('Evaluadores');//->onDelete('cascade');
            $table->foreign('idNumeroEncuestaAtributos')->references('id')->on('NumeroEncuestaAtributos');//->onDelete('cascade');
        });

        Schema::create('RespuestaAtributos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('respuesta');
            $table->bigInteger('idPreguntaAspectoAtributo');
            $table->bigInteger('idEncuestaAsignada');
            $table->timestamps();
            $table->foreign('idPreguntaAspectoAtributo')->references('id')->on('PreguntasAspectosAtributos');//->onDelete('cascade');
            $table->foreign('idEncuestaAsignada')->references('id')->on('EncuestaAsignadaAtributos');//->onDelete('cascade');
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
