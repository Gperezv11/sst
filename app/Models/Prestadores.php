<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestadores extends Model
{
    protected $fillable =['id',
    'rut',
    'nombre',
    'email',
    'telefono',
    'nacionalidad',
    'region',
    'comuna',
    'direccion',
    'nombre_contacto',
    'telefono_contacto',
    'email_contacto',
    'cargo_contacto',
    'imagen',
    'estado_ficha',
    'nombre_region',
    'nombre_comuna'];
}