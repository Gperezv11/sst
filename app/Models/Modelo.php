<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'nombre',
        'abreviatura',
        'id_marca',
        'marca'
    ];
}