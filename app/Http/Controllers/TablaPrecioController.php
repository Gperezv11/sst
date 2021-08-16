<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoPrecio;
use App\Models\ListaPrecio;
use App\Models\Bodega;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TablaPrecioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $listaprecios=ListaPrecio::all();
        $bodegas = Bodega::all();
        
        $listaElejida = $request->get('id_lista_precio');
        Log::info("Index  :" . $listaElejida);

        if ( $listaElejida) {
            $prodprecio = ProductoPrecio::where('id_lista_precio', $listaElejida)
               ->get();
               Log::info("Index  por lista :");
        }else{
            $prodprecio = ProductoPrecio::all();
            Log::info("Index  inicial :");
        }
        
        $prodprecio ->each(function($prodprecio){
            $prodprecio->bodega;
            $prodprecio->listaPrecio;
            $prodprecio->fichaPrecio;
        }); 

          
        return view ('Ventas.tablaPrecio')->with('prodprecio', $prodprecio)->with('listaPrecios', $listaprecios)->with('bodegas',$bodegas);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        log::info("valor lista seleccionado " . $request->id_listaPrecio_edit);
        log::info("valor id : " . $id);
        log::info("valor producto : " . $request->get('id_producto_edit'));

        try{
            
            $idExiste = ProductoPrecio::find($id)
            ->where('id_producto', '=', $request->get('id_producto_edit'))
            ->where('id', '=', $id)
            ->update([
                'id_lista_precio'=>$request->id_listaPrecio_edit,
                'precio_costo'=> $request->precioCosto_edit,
                'margen'=> $request->margen_edit,
                'precio_venta'=> $request->precioVenta_edit,
                'descuento'=> $request->descuento_edit,
                'valor_venta_neto'=> $request->ventaNeto_edit,
                'precio_venta_final'=> $request->ventaFinal_edit,
                'id_bodega'=> $request->id_bodega_edit,
                'iva'=> $request->iva_edit,
                'otro_impuesto'=> $request->otroImpuesto_edit,
                'stock'=> $request->stock_edit
                ]);
 
                Log::info ("encontro ? " . $idExiste . " id : " . $id . " id producto : " . $request->get('id_producto_edit'));
        if ($idExiste === 1) {
            return redirect('/listadoprecio')->with('status','Ficha actualizada con exito');
        }else{
            return redirect('/listadoprecio')->with('messageerror','No se ha actualizado el registro ');
        }
                
    
        }catch(Exception $e) {
            Log::alert($e);
            return redirect('/listadoprecio')->with('messageerror', 'Error al actualizar el  registro'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info("funcion eliminar precio producto : " . $id );
        
        try{
            $cat = ProductoPrecio::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/listadoprecio')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/listadoprecio')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    public function obProdxListaPrecio(Request $request){
        
        $listaprecios=ListaPrecio::all();
        $bodegas = Bodega::all();
        $listaElejida = $request->get('id_lista_precio');
        
        Log::info("Lista Precio seleccionada :" . $listaElejida);

        if ($listaElejida == '0') {
            $prodprecio = DB::table('producto_precios')
        ->leftJoin('bodegas', 'producto_precios.id_bodega', '=', 'bodegas.id')
        ->leftJoin('lista_precios', 'producto_precios.id_lista_precio', '=', 'lista_precios.id')
        ->leftJoin('ficha_producto_servicios', 'producto_precios.id_producto', '=', 'ficha_producto_servicios.id')
        ->select(
            'producto_precios.id as id_productoPrecio',
            'producto_precios.precio_venta_final',
            'producto_precios.id_lista_precio',
            'producto_precios.precio_costo',
            'producto_precios.margen',
            'producto_precios.precio_venta',
            'producto_precios.descuento',
            'producto_precios.valor_venta_neto',
            'producto_precios.id_bodega',
            'producto_precios.iva',
            'producto_precios.otro_impuesto',
            'producto_precios.stock',
            'producto_precios.created_at',
            'ficha_producto_servicios.id',
            'ficha_producto_servicios.sku',
            'ficha_producto_servicios.codigo_barra',
            'bodegas.nombre as nombre_bodega',
            'lista_precios.nombre as nombre_lista',
            'ficha_producto_servicios.nombre')
            ->get();
        }else{
            $prodprecio = DB::table('producto_precios')
        ->leftJoin('bodegas', 'producto_precios.id_bodega', '=', 'bodegas.id')
        ->leftJoin('lista_precios', 'producto_precios.id_lista_precio', '=', 'lista_precios.id')
        ->leftJoin('ficha_producto_servicios', 'producto_precios.id_producto', '=', 'ficha_producto_servicios.id')
        ->select(
            'producto_precios.id as id_productoPrecio',
            'producto_precios.precio_venta_final',
            'producto_precios.id_lista_precio',
            'producto_precios.precio_costo',
            'producto_precios.margen',
            'producto_precios.precio_venta',
            'producto_precios.descuento',
            'producto_precios.valor_venta_neto',
            'producto_precios.id_bodega',
            'producto_precios.iva',
            'producto_precios.otro_impuesto',
            'producto_precios.stock',
            'producto_precios.created_at',
            'ficha_producto_servicios.id',
            'ficha_producto_servicios.sku',
            'ficha_producto_servicios.codigo_barra',
            'bodegas.nombre as nombre_bodega',
            'lista_precios.nombre as nombre_lista',
            'ficha_producto_servicios.nombre')
            ->where('producto_precios.id_lista_precio',$listaElejida)
            ->get();
        }
            return redirect()->back()->with('prodprecios',$prodprecio)->with('listaPrecios', $listaprecios)->with('bodegas',$bodegas);
              
        
    }
}
