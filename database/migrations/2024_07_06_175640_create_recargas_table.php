<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecargasTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('recargas')) {
            Schema::create('recargas', function (Blueprint $table) {
                $table->id('id_recarga');
                $table->unsignedBigInteger('id_telepass');
                $table->double('monto', 10, 2);
                $table->timestamps();

                $table->foreign('id_telepass')->references('id_telepass')->on('telepass')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('recargas');
    }
}