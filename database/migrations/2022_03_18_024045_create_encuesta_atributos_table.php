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
            $table->bigInteger('numero_encuesta_atributo_id');
            $table->bigInteger('atributo_id');
            $table->timestamps();
            $table->foreign('numero_encuesta_atributo_id')->references('id')->on('numero_encuesta_atributos');//->onDelete('cascade');
            $table->foreign('atributo_id')->references('id')->on('atributos');//->onDelete('cascade');
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
