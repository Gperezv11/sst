<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use resources\views\Ventas\listaPrecio;
use resources\views\Ventas\tabla_precio;


class ProductoPrecio extends Model
{
    

    protected $fillable =[
    'nombre',
    'id_producto',
    'nombre',
    'id_lista_precio',
    'sku',
    'codigo_barra',
    'precio_costo',
    'margen',
    'precio_venta',
    'descuento',
    'valor_venta_neto',
    'precio_venta_final',
    'id_bodega',
    'iva',
    'otro_impuesto',
    'stock'];

    protected $table = 'producto_precios';

   public function bodega(){
        return $this->belongsTo('App\Models\Bodega','id_bodega','id');
    }

    public function listaPrecio(){
        return $this->belongsTo('App\Models\ListaPrecio','id_lista_precio', 'id');
    }

    public function fichaPrecio(){
        return $this->belongsTo('App\Models\FichaProductoServicio','id_producto','id');
    }

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido','producto_id', 'id_producto');
    }

    public function scopeLista($query,$listaElejida){
        if($listaElejida)
            return $query ->where ('id_lista_precio','=',"$listaElejida");
    }

    public function scopeBuscaBodega($query,$bodega){
        if($bodega)
            return $query->where ('id_bodega','=',"$bodega");
    }

    public function scopeBuscaProducto($query,$producto){
        if($producto)
            return $query->where ('id_producto','=',"$producto");
    }

    public function scopeProductoNombre($query,$name){
        if($name)
            return $query->where ('nombre','LIKE',"%$name%");
    }
}

