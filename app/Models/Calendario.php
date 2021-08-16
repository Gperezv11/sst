<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;
    static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'medico' => 'required',
        'owner' => 'required',
        'email' => 'required',
        'fono' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];
    protected $fillable = [
        'title',
        'descripcion',
        'medico',
        'owner',
        'email',
        'fono',
        'start',
        'end'
    ];
}
