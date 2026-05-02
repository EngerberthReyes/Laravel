<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importante

class InterfacesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('interfaces')->insert([
            ['nombre' => 'Interfaz de Usuario (Frontend)', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Interfaz de Administración (Backend)', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'API REST Externa', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Interfaz de Reportes PDF', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
