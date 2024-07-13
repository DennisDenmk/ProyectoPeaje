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
            $table->date('fecha');
            $table->string('placa')->nullable();
            $table->integer('tipo_Vehiculo');
            $table->integer('tipo_pago');
            $table->timestamps();
            $table->foreign('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
            $table->foreign('placa')->references('placa')->on('vehiculos')->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('finanzas');
    }
};
