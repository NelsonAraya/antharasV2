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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique();
            $table->string('dv',1);
            $table->integer('rol')->nullable()->unique();
            $table->string('nombres');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->date('fecha_nacimiento');
            $table->integer('telefono');
            $table->string('direccion');
            $table->integer('cia_id')->unsigned();
            $table->foreign('cia_id')->references('id')->on('cias');
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->integer('sanguineo_id')->unsigned();
            $table->foreign('sanguineo_id')->references('id')->on('grupo_sanguineos');
            $table->string('email',150)->unique()->nullable();
            $table->enum('conductor',['S','N'])->default('N');
            $table->date('fecha_ingreso');
            $table->date('fecha_licencia')->nullable();
            $table->string('password');
            $table->enum('estado',['A','I'])->default('A');
            $table->enum('activado',['S','N'])->default('N');
            $table->enum('activado_conductor',['S','N'])->default('N');
            $table->enum('operativo',['S','N'])->default('N');
            $table->enum('tipo_conductor',['C','B'])->default('B');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
