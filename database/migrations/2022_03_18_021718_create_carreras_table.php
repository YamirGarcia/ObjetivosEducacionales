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
        Schema::create('carreras', function (Blueprint $table) {
             $table->id();
            $table->string('carrera');
            $table->string('planEstudios');
            $table->bigInteger('creadopor');
            $table->boolean('noBorrar')->default('False');
            $table->boolean('oculto')->default('False');
            $table->timestamps();

            $table->foreign('creadopor')->references('id')->on('users');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
};
