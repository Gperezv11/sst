<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'rut',
        'nombre',
        'tipopermiso',
        'finicio',
        'ftermino'
    ];

    public function getFinicioAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getFterminoAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
