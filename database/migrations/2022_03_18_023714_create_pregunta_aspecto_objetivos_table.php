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
        Schema::create('pregunta_aspecto_objetivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Pregunta');
            $table->bigInteger('idAspectoObjetivo');
            $table->foreign('idAspectoObjetivo')->references('id')->on('aspectos_objetivos');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_aspecto_objetivos');
    }
};
