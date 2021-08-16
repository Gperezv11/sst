<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'abreviatura',
        'imagen'
    ];

    protected $table = 'categorias';

    
    public function productos(){
        return $this->belongsTo('App\Models\FichaProductoServicio','id_categoria','id');
    }
}
