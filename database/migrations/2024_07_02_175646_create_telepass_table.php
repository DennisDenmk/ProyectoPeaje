<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelepassTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('telepass')) {
            Schema::create('telepass', function (Blueprint $table) {
                $table->id('id_telepass');
                $table->unsignedBigInteger('id_cliente');
                $table->double('saldo', 10, 2);
                $table->date('fecha_emision');
                $table->date('fecha_expiracion');
                $table->timestamps();

                $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('telepass');
    }
}