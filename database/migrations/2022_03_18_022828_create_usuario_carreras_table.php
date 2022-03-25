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
        Schema::create('usuario_carreras', function (Blueprint $table) {
            // $table->bigInteger('usuario_id');
            $table->bigInteger('user_id');
            $table->bigInteger('carrera_id');
            $table->timestamps();
            // $table->foreign('usuario_id')->references('id')->on('usuarios');//->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras');//->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_carreras');
    }
};
