<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeajesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('peajes')) {
            Schema::create('peajes', function (Blueprint $table) {
                $table->id('id_peaje');
                $table->string('ubicacion',50);
                $table->timestamps();
            });
        }
        
    }

    public function down()
    {
        Schema::dropIfExists('peajes');
    }
}


