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
            $table->bigInteger('pregunta_aspecto_objetivo_id');
            $table->bigInteger('encuesta_asignada_objetivo_id');
            $table->timestamps();
            $table->foreign('pregunta_aspecto_objetivo_id')->references('id')->on('pregunta_aspecto_objetivos');//->onDelete('cascade');
            $table->foreign('encuesta_asignada_objetivo_id')->references('id')->on('encuesta_asignada_objetivos');//->onDelete('cascade');
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
