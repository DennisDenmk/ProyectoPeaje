<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('empleados')) {
            Schema::create('empleados', function (Blueprint $table) {
                $table->id('id_empleado');
                $table->string('contrasenia');
                $table->string('cedula',10)->unique();
                $table->integer('rol');
                $table->unsignedBigInteger('id_peaje');
                $table->string('correo',50)->unique();
                $table->double('sueldo', 8, 2);
                $table->timestamps();
                $table->foreign('id_peaje')->references('id_peaje')->on('peajes')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}