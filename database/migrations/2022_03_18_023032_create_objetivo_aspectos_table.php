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
            $table->bigInteger('objetivo_educacional_id');
            $table->bigInteger('aspectos_objetivos_id');
            $table->timestamps();
            $table->foreign('objetivo_educacional_id')->references('id')->on('objetivo_educacionals');//->onDelete('cascade');
            $table->foreign('aspectos_objetivos_id')->references('id')->on('aspectos_objetivos');//->onDelete('cascade');
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
