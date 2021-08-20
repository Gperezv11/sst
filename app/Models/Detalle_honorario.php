<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_honorario extends Model
{
    protected $fillable = [

        'tipo_servicio',
        'comentario',
        'bruto',
        // 'retencion',
        // 'liquido',
        // 'honorarios_id'
    ];
    use HasFactory;
}
