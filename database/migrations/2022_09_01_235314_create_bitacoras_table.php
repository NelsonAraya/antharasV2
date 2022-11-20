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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_llegada')->nullable();
            $table->time('hora_llegada')->nullable();
            $table->integer('kmsalida')->nullable();
            $table->integer('kmllegada')->nullable();
            $table->integer('emergencia_id')->unsigned();
            $table->foreign('emergencia_id')->references('id')->on('emergencias');
            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->integer('conductor_id')->unsigned()->nullable();
            $table->foreign('conductor_id')->references('id')->on('usuarios');
            $table->integer('obac_id')->unsigned()->nullable();
            $table->foreign('obac_id')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
};
