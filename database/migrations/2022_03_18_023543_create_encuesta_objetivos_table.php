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
            $table->bigInteger('numero_encuesta_objetivo_id');
            $table->bigInteger('objetivo_educacional_id');
            $table->timestamps();
            $table->foreign('numero_encuesta_objetivo_id')->references('id')->on('numero_encuesta_objetivos');//->onDelete('cascade');
            $table->foreign('objetivo_educacional_id')->references('id')->on('objetivo_educacionals');//->onDelete('cascade');
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
