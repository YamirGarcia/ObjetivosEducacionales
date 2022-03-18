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
        Schema::create('encuesta_asignada_objetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periodo');
            $table->bigInteger('idEvaluador');
            $table->bigInteger('idNumeroEncuestaObjetivos');
            $table->foreign('idEvaluador')->references('id')->on('evaluadors');//->onDelete('cascade');
            $table->foreign('idNumeroEncuestaObjetivos')->references('id')->on('numero_encuesta_objetivos');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_asignada_objetivos');
    }
};
