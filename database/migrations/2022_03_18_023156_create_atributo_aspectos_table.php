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
        Schema::create('atributo_aspectos', function (Blueprint $table) {
            $table->bigInteger('idAtributo');
            $table->bigInteger('idAspectoAtributo');
            $table->timestamps();
            $table->foreign('idAtributo')->references('id')->on('atributos');//->onDelete('cascade');
            $table->foreign('idAspectoAtributo')->references('id')->on('aspectos_atributos');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atributo_aspectos');
    }
};
