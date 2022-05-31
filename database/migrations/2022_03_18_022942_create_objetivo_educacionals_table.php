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
        Schema::create('objetivo_educacionals', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 800);
            $table->bigInteger('idCarrera')->unsigned();
            $table->float('meta', 8, 2);
            $table->timestamps();
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
        Schema::dropIfExists('objetivo_educacionals');
    }
};
