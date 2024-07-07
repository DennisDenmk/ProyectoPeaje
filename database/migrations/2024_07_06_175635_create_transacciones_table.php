<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('transacciones')) {
            Schema::create('transacciones', function (Blueprint $table) {
                $table->id('id_transaccion');
                $table->unsignedBigInteger('id_cliente');
                $table->unsignedBigInteger('id_vehiculo');
                $table->double('monto', 10, 2);
                $table->unsignedBigInteger('id_peaje');
                $table->timestamps();

                $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
                $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade');
                $table->foreign('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}