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
        Schema::create('clave_emergencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave',10)->unique();
            $table->string('descripcion')->nullable();
            $table->enum('estado',['A','I'])->default('A');
            $table->enum('tipo',['A','B'])->default('A');
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
        Schema::dropIfExists('clave_emergencias');
    }
};
