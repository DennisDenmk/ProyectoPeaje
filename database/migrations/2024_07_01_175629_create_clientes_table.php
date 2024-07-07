<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('clientes')) {
            Schema::create('clientes', function (Blueprint $table) {
                $table->id('id_cliente');
                $table->string('nombre',50);
                $table->string('cedula',10)->unique();
                $table->string('contrasenia');
                $table->string('correo',50)->unique();
                $table->string('telefono',15);
                $table->double('saldo', 10, 2)->default(0);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}