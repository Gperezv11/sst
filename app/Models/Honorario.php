<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honorario extends Model
{
    protected $fillable = [

        'n_documento_honorario',
        'fecha_emicion_honorario',
        'fecha_vencimiento_honorario',
        'plazo',
        'periodo',
        'forma_pago_id',
        'tipo_documento_honorario_Id',
        'comentario',
        'prestadors_id',
        'url_honorario'
    ];
    
    use HasFactory;
}
