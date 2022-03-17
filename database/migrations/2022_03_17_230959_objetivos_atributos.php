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
        //
        Schema::create('ObjetivosEducacionales', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->bigInteger('idCarrera')->unsigned();
            $table->foreign('idCarrera')->references('id')->on('Carreras');//->onDelete('cascade');
        });
    
        Schema::create('ObjetivosAspectos', function (Blueprint $table) {
            $table->bigInteger('idObjetivo');
            $table->bigInteger('idAspectoObjetivo');
            $table->foreign('idObjetivo')->references('id')->on('ObjetivosEducacionales');//->onDelete('cascade');
            $table->foreign('idAspectoObjetivo')->references('id')->on('AspectosObjetivos');//->onDelete('cascade');
        });

        Schema::create('Atributos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->bigInteger('idCarrera')->unsigned();
            $table->foreign('idCarrera')->references('id')->on('Carreras');//->onDelete('cascade');
        });
    
        Schema::create('AtributosAspectos', function (Blueprint $table) {
            $table->bigInteger('idAtributo');
            $table->bigInteger('idAspectoAtributo');
            $table->foreign('idAtributo')->references('id')->on('Atributos');//->onDelete('cascade');
            $table->foreign('idAspectoAtributo')->references('id')->on('AspectosAtributos');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
