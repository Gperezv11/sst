<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{
    protected $fillable = [
        'patente',
        'marca',
        'modelo',
        'nombre',
        'celular',
        'email'
    ];


    
    
}