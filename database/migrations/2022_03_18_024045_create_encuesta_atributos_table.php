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
            $table->bigInteger('idEncuestaAtributos');
            $table->bigInteger('idAtributo');
            $table->timestamps();
            $table->foreign('idEncuestaAtributos')->references('id')->on('numero_encuesta_atributos');//->onDelete('cascade');
            $table->foreign('idAtributo')->references('id')->on('atributos');//->onDelete('cascade');
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
