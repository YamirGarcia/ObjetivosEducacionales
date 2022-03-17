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
        Schema::create('NumeroEncuestaObjetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('idCarrera');
            $table->foreign('idCarrera')->references('id')->on('Carreras');//->onDelete('cascade');
        });

        Schema::create('EncuestaObjetivos', function (Blueprint $table) {
            $table->bigInteger('idEncuestaObjetivo');
            $table->bigInteger('idObjetivo');
            $table->foreign('idEncuestaObjetivo')->references('id')->on('NumeroEncuestaObjetivos');//->onDelete('cascade');
            $table->foreign('idObjetivo')->references('id')->on('ObjetivosEducacionales');//->onDelete('cascade');
        });

        Schema::create('PreguntasAspectosObjetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Pregunta');
            $table->bigInteger('idAspectoObjetivo');
            $table->foreign('idAspectoObjetivo')->references('id')->on('AspectosObjetivos');//->onDelete('cascade');

        });

        Schema::create('EncuestaAsignadaObjetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periodo');
            $table->bigInteger('idEvaluador');
            $table->bigInteger('idNumeroEncuestaObjetivos');
            $table->foreign('idEvaluador')->references('id')->on('Evaluadores');//->onDelete('cascade');
            $table->foreign('idNumeroEncuestaObjetivos')->references('id')->on('NumeroEncuestaObjetivos');//->onDelete('cascade');
        });

        Schema::create('RespuestaObjetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('respuesta');
            $table->bigInteger('idPreguntaAspectoObjetivo');
            $table->bigInteger('idEncuestaAsignada');
            $table->timestamps();
            $table->foreign('idPreguntaAspectoObjetivo')->references('id')->on('PreguntasAspectosObjetivos');//->onDelete('cascade');
            $table->foreign('idEncuestaAsignada')->references('id')->on('EncuestaAsignadaObjetivos');//->onDelete('cascade');
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
