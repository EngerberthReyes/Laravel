<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispositivoInterfaceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insertar un Dispositivo (Servidor)
        $servidorId = DB::table('dispositivos')->insertGetId([
            'nombre' => 'Servidor-Dell-R740',
            'modelo' => 'PowerEdge R740',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Interfaces para el Servidor
        DB::table('interfaces')->insert([
            [
                'dispositivo_id' => $servidorId,
                'nombre' => 'eth0',
                'tipo' => 'Física',
                'direccion_ip' => '192.168.1.10',
                'mac_address' => '00:1A:2B:3C:4D:5E',
                'activo' => true,
                'descripcion' => 'Enlace principal a Internet',
                'created_at' => now(),
            ],
            [
                'dispositivo_id' => $servidorId,
                'nombre' => 'docker0',
                'tipo' => 'Virtual',
                'direccion_ip' => '172.17.0.1',
                'mac_address' => '02:42:AC:11:00:01',
                'activo' => true,
                'descripcion' => 'Interfaz de puente para contenedores',
                'created_at' => now(),
            ],
        ]);

        // 2. Insertar otro Dispositivo (Router)
        $routerId = DB::table('dispositivos')->insertGetId([
            'nombre' => 'Router-MikroTik',
            'modelo' => 'CCR2004',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Interfaz para el Router
        DB::table('interfaces')->insert([
            'dispositivo_id' => $routerId,
            'nombre' => 'sfp-sfpplus1',
            'tipo' => 'Física',
            'direccion_ip' => '10.0.0.1',
            'mac_address' => 'E4:8D:8C:AA:BB:CC',
            'activo' => false, // Interfaz apagada
            'descripcion' => 'Fibra óptica hacia el Switch Core',
            'created_at' => now(),
        ]);
    }
}
