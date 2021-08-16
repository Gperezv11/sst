<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_nombre', 
        'evento_inicio', 
        'evento_termino'
    ]; 
}
