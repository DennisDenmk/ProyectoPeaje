<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTelepassTable extends Migration
{
    public function up()
    {
        Schema::create('tagTelepass', function (Blueprint $table) {
            $table->id('id_tagTelepass');
            $table->unsignedBigInteger('id_finanzas');
            $table->unsignedBigInteger('id_vehiculo');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_peaje');
            $table->string('codigo');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('id_finanzas')->references('id_finanzas')->on('finanzas')->onDelete('cascade');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tagTelepass');
    }
}