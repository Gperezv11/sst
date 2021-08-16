<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use resources\views\POS\tabla_comanda;


class Pedido extends Model
{
    protected $fillable = [
        'id',
        'comanda_id',
        'nombre',
        'producto_id',
        'cantidad',
        'precio_venta',
        'comentario',
        'precio_unitario',
        'total',
        'subtotal',
        'propina',
        'total_pago',
        'estado',
        'descuento',
        'tipo_descuento'
    ];

    protected $table = 'pedidos';

    
    public function comanda(){
        return $this->belongsTo('App\Models\Comanda','comanda_id','id');
    }

    public function productoPrecio(){
        return $this->hasMany('App\Models\ProductoPrecio','id_producto','producto_id');
    }
    public function producto(){
        return $this->hasMany('App\Models\FichaProductoServicio','id','producto_id');
    }
    
    public function scopeBuscarComanda($query,$comanda_id){
        if($comanda_id)
            return $query->where ('comanda_id','=',"$comanda_id");
    }
}
