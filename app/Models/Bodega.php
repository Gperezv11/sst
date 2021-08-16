<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $fillable = [
        'nombre',
        'abreviatura'
    ];

    protected $table = 'bodegas';
    public function bodega(){
        return $this->hasMany('App\Models\ProductoPrecio','id_bodega');
    }
}
