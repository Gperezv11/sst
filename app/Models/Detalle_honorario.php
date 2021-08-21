<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_honorario extends Model
{
    protected $fillable = [

        'honorarios_id',
        'tipo_servicio',
        'cometario',
        'bruto',
        'retencion',
        'liquido'
    ];
    use HasFactory;
}
