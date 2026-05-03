<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interfaz extends Model
{
    // Esto le dice a Laravel: "No busques 'interfazs', busca 'interfaces'"
    protected $table = 'interfaces';

    // También asegúrate de que los campos sean "llenables"
    protected $fillable = ['dispositivo_id', 'nombre', 'tipo', 'direccion_ip', 'mac_address', 'activo', 'descripcion'];

    /**
     * Relación: Una interfaz pertenece a un dispositivo
     */
    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class);
    }
}
