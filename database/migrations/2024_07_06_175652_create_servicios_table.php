<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('servicios')) {
            Schema::create('servicios', function (Blueprint $table) {
                $table->id('id_servicio');
                $table->unsignedBigInteger('id_cliente');
                $table->unsignedBigInteger('id_vehiculo');
                $table->integer('servicio');
                $table->boolean('disponibilidad');
                $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
                $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
