<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeajesTableSeeder extends Seeder
{
    public function run()
    {
            DB::table('peajes')->insert([
                'ubicacion' => "Cayambe",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('peajes')->insert([
                'ubicacion' => "SanRoque",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('peajes')->insert([
                'ubicacion' => "Ambuqui",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('peajes')->insert([
                'ubicacion' => "Ibarra",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
    }
}

