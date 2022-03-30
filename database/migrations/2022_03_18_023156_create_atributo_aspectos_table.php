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
            $table->id();
            $table->bigInteger('atributo_id');
            $table->bigInteger('aspectos_atributos_id');
            $table->timestamps();
            $table->foreign('atributo_id')->references('id')->on('atributos');//->onDelete('cascade');
            $table->foreign('aspectos_atributos_id')->references('id')->on('aspectos_atributos');//->onDelete('cascade');
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
