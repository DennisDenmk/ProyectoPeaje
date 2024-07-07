<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Vehiculo;
use Faker\Factory as Faker;


class CreateVehiculosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('vehiculos')) {
            Schema::create('vehiculos', function (Blueprint $table) {
                $table->id('id_vehiculo');
                $table->string('placa', 7)->unique();
                $table->integer('tipo_vehiculo');
                $table->string('anio',4);
                $table->unsignedBigInteger('id_cliente')->nullable();
                $table->timestamps();
                $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            });
            
            $faker = Faker::create();
            for ($i = 0; $i < 50; $i++) {
                Vehiculo::create([
                    'placa' => $faker->unique()->regexify('[A-Z]{3}[0-9]{4}'),
                    'tipo_vehiculo' => $faker->numberBetween(1, 5), // Ejemplo de tipos de vehículo
                    'anio' => $faker->numberBetween(2000, 2023),
                    'id_cliente' => null,
                ]);
            }
        }
    }

    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}