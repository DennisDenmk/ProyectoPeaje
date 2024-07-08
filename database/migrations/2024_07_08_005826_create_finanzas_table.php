<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanzasTable extends Migration
{
    public function up()
    {
        Schema::create('finanzas', function (Blueprint $table) {
            $table->id('id_finanzas');
            $table->foreignId('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
            $table->double('saldo', 8, 2);
            $table->foreignId('id_empleado')->references('id_empleado')->on('empleados')->onDelete('cascade');
            $table->date('fecha');
            $table->integer('tipo_vehiculo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('finanzas');
    }
}