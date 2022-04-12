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
        Schema::create('encuesta_objetivos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idEncuestaAsignada');
            $table->bigInteger('idAspectoObjetivo');
            $table->timestamps();
            $table->foreign('idEncuestaAsignada')->references('id')->on('encuesta_evaluador_objetivos');
            $table->foreign('idAspectoObjetivo')->references('id')->on('aspectos_objetivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_objetivos');
    }
};
