<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'nombre',
        'sucursal',
        'dia',
        'hora',
        'adultos',
        'niños',
        'cantidad',
        'email',
        'celular',
        'mesa',
        'comentario'
    ];


    
    
}