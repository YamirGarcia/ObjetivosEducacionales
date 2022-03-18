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
            $table->string('respuesta');
            $table->bigInteger('idPreguntaAspectoAtributo');
            $table->bigInteger('idEncuestaAsignada');
            $table->timestamps();
            $table->foreign('idPreguntaAspectoAtributo')->references('id')->on('pregunta_aspecto_atributos');//->onDelete('cascade');
            $table->foreign('idEncuestaAsignada')->references('id')->on('encuesta_asignada_atributos');//->onDelete('cascade');
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
