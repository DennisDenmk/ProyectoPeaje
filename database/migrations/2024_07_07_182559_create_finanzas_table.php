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
            $table->unsignedBigInteger('id_peaje');
            $table->double('saldo', 8, 2);
            $table->unsignedBigInteger('id_empleado');
            $table->date('fecha');
            $table->integer('tipo_Vehiculo');
            $table->timestamps();
            $table->foreign('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('finanzas');
    }
};