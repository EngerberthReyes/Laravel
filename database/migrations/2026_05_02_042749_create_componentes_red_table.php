<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabla de Dispositivos o Sistemas (El "Padre")
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej: Servidor-Principal, Router-Oficina
            $table->string('modelo')->nullable();
            $table->timestamps();
        });

        // 2. Tabla de Interfaces (Relacionada con Dispositivos)
        Schema::create('interfaces', function (Blueprint $table) {
            $table->id();
            // Creamos la relación: Una interfaz pertenece a un dispositivo
            $table->foreignId('dispositivo_id')
                ->constrained('dispositivos')
                ->onDelete('cascade'); // Si borras el dispositivo, se borran sus interfaces

            $table->string('nombre'); // Ej: eth0, wlan0, GigabitEthernet1
            $table->enum('tipo', ['Física', 'Virtual', 'Túnel'])->default('Física');
            $table->string('direccion_ip')->nullable();
            $table->string('mac_address')->unique()->nullable();
            $table->boolean('activo')->default(true);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interfaces');
        Schema::dropIfExists('dispositivos');
    }
};
