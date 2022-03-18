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
            $table->bigInteger('idUsuario');
            $table->bigInteger('idCarrera');
            $table->timestamps();
            $table->foreign('idUsuario')->references('id')->on('usuarios');//->onDelete('cascade');
            $table->foreign('idCarrera')->references('id')->on('carreras');//->onDelete('cascade');
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
