<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use resources\views\Ventas\clientev;


class Fichacliente extends Model
{
    protected $fillable =['email',
    'direccion',
    'rut',
    'nombre_cliente',
    'telefono',
    'nacionalidad',
    'region',
    'comuna',
    'giro',
    'cod_actividad',
    'sucursal',
    'rut_rep_legal',
    'nombre_rep_legal',
    'nombre_sucursal',
    'codigo_sucursal',
    'encargado_sucursal',
    'region_sucursal',
    'comuna_sucursal',
    'direccion_sucursal',
    'nombre_contacto',
    'telefono_contacto',
    'email_contacto',
    'cargo_contacto',
    'imagen',
    'estadoficha',
    'id',
    'nombre_region',
    'nombre_comuna'];

    


}

