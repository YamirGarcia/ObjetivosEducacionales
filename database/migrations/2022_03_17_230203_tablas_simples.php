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
        Schema::create('Departamento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
        });

        Schema::create('GrupoDeInteres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
        });

        Schema::create('AspectosObjetivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
        });

        Schema::create('AspectosAtributos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
        });
        
        Schema::create('Carreras', function (Blueprint $table) {
            $table->id();
            $table->string('carrera', 100);
            $table->string('planEstudios', 100);
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
