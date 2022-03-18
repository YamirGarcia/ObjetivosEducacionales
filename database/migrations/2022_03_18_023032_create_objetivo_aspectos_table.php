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
        Schema::create('objetivo_aspectos', function (Blueprint $table) {
            $table->bigInteger('idObjetivo');
            $table->bigInteger('idAspectoObjetivo');
            $table->foreign('idObjetivo')->references('id')->on('objetivo_educacionals');//->onDelete('cascade');
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
        Schema::dropIfExists('objetivo_aspectos');
    }
};
