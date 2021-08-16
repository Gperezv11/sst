<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaPrecio extends Model
{
    protected $fillable = [
        'nombre',
        'abreviatura'
    ];

    protected $table = 'lista_precios';

    public function listaPrecio(){
        return $this->hasMany('App\Models\ProductoPrecio');
    }
}
