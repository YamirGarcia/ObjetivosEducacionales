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
        Schema::create('encuesta_atributos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idEncuestaAsignada');
            $table->bigInteger('idAspectoAtributo');
            $table->timestamps();
            $table->foreign('idEncuestaAsignada')->references('id')->on('encuesta_evaluador_atributos');
            $table->foreign('idAspectoAtributo')->references('id')->on('aspectos_atributos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_atributos');
    }
};
