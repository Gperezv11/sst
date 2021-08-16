<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use resources\views\ficha;

class Fichapersonal extends Model
{

    protected $fillable=['rut','nombre','apellido_pat','apellido_mat','direccion','fono','mail'
    ,'region', 'comuna','nacionalidad','empresa','cargo','supervisor','proyecto','sueldo_base','bono'
    ,'asignacion','afp','salud','plan_salud','fecha_ingreso','fecha_termino','tipo_contrato','foto'
        ,'anexo','entrega_i','entrega_r','imagen','anexo','finiquito','contrato','regla','imple','estadoficha'];


    public function getFechaIngresoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getFechaTerminoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }


}

