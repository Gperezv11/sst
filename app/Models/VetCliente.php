<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetCliente extends Model
{
    use HasFactory;
    protected $fillable = ['rut', 'nombre', 'apellido_p', 'apellido_m', 'region', 'comuna', 'direccion', 'sector', 'correo', 'telefono', 'referencia'];
}
