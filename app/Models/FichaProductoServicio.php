<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use resources\views\Productos\productoServicio;


class FichaProductoServicio extends Model
{
    protected $fillable =['imagen',
    'nombre',
    'id',
    'sku',
    'codigo_barra',
    'unidad_medida',
    'inventario',
    'estado_venta',
    'afecto',
    'otro_impuesto',
    'stock_critico',
    'id_tipoProducto',
    'nombre_tipoProducto',
    'id_linea_negocio',
    'nombre_linea_negocio',
    'id_categoria',
    'nombre_categoria',
    'id_subcategoria',
    'nombre_subcategoria',
    'id_marca',
    'nombre_marca',
    'id_submarca',
    'nombre_submarca',
    'nombre_medida',
    'descripcion',
    'stock_maximo'];

    
    protected $table = 'ficha_producto_servicios';

    
    public function fichaPrecio(){
        return $this->hasMany('App\Models\ProductoPrecio','id_producto','id')->where('id_lista_precio','8')->where('id_bodega','7');
    }

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido', 'producto_id','id');
    }
    
    public function categorias(){
        return $this->hasMany('App\Models\Categoria','id','id_categoria');
    }


    public function scopeProducto($query,$name){
        if($name)
            return $query->where ('nombre','LIKE',"%$name%");
    }

}

