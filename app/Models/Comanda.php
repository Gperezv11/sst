<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use resources\views\POS\tabla_comanda;


class Comanda extends Model
{
    protected $fillable = [
        'id',
        'rut_empresa',
        'suc_empresa',
        'lista_precio_id',
        'bodega_id',
        'vendedor',
        'orden',
        'propina',
        'total',
        'estado',
        'medio_pago',
        'descuento',
        'tipo_descuento'
    ];

    protected $table = 'comandas';

    public function cliente(){
        return $this->belongsTo('App\Models\FichaCliente','rutEmpresa','rut');
    }

    public function listaPrecio(){
        return $this->belongsTo('App\Models\ListaPrecio','listaPrecio_id', 'id');
    }

    public function producto(){
        return $this->belongsTo('App\Models\FichaProductoServicio','producto_id', 'id');
    }

    public function bodega(){
        return $this->belongsTo('App\Models\Bodega','bodega_id','id');
    }
    
    public function pedidos(){
        return $this->hasmany('App\Models\Pedidos','comanda_id','id');
    }
    
    
    public function scopeRutEmpresa($query,$rut){
        if($rut)
            return $query->where ('rut_empresa','=',"$rut");
    }
    public function scopeListaPrecio($query,$lista){
        if($lista)
            return $query->where ('lista_precio_id','=',"$lista");
    }
    public function scopeBuscarBodega($query,$bodega){
        if($bodega)
            return $query->where ('bodega_id','=',"$bodega");
    }
    
}
