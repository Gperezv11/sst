<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    protected $fillable = [

        'rut_prestador ',
        'nombre_prestador',
        'apellido_p_prestador',
        'apellido_m_prestador',
        'email_prestador',
        'telefono_prestador',
        'direccion_prestador',
        'cargos_id',
        'comuna_id',
        'razon_social_prestador',
        'direccion_empresa_prestador',
        'telefono_empresa_prestador'
    ];


    use HasFactory;
}
