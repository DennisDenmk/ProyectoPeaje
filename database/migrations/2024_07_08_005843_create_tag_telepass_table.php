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
            $table->foreignId('id_finanzas')->references('id_finanzas')->on('finanzas')->onDelete('cascade');
            $table->foreignId('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade');
            $table->foreignId('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreignId('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tagTelepass');
    }
}
