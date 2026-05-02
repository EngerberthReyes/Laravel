<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemadeInterfaces extends Model
{
    use HasFactory;

    // Con esta línea le dices a Laravel el nombre real de la tabla
    protected $table = 'interfaces';
}
