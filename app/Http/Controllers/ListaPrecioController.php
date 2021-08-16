<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaProductoServicio;
use App\Models\ProductoPrecio;
use App\Models\ListaPrecio;
use App\Models\Bodega;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ListaPrecioController extends Controller
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
    public function index()
    {
        $listaprecios=ListaPrecio::all();
        $bodegas = Bodega::all();

        $fichas = DB::table('ficha_producto_servicios')
            ->select('ficha_producto_servicios.id', 
            'ficha_producto_servicios.nombre',
            'ficha_producto_servicios.sku',
            'ficha_producto_servicios.codigo_barra', 
            'ficha_producto_servicios.imagen',
            'ficha_producto_servicios.inventario',
            'ficha_producto_servicios.estado_venta', 
            'ficha_producto_servicios.afecto', 
            'ficha_producto_servicios.otro_impuesto', 
            'ficha_producto_servicios.stock_critico', 
            'ficha_producto_servicios.created_at', 
            'ficha_producto_servicios.updated_at', 
            'ficha_producto_servicios.stock_maximo')
            ->where('ficha_producto_servicios.estado_venta','=','1')
            ->get();
            
        return view ('Ventas.listaPrecio')->with('fichas',$fichas)->with('bodegas',$bodegas)->with('listaprecios',$listaprecios);
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
        Log::info("store de lista precio");
        try{
            $prodEnLista =ProductoPrecio::where('id_producto',$request->get('id_producto'))
                                        ->where('id_lista_precio',$request->id_listaPrecio)
                                        ->where('id_bodega',$request->id_bodega)
                                        ->first();

            if($prodEnLista){
                Log::info("prodEnLista : " . $prodEnLista);
                return redirect('/ingresarprecio')->with('messageinfo','el producto ya pertenece a la lista de precios y bodega');
            }else{
                $tipo = ProductoPrecio::create([
                    'id_producto'=>$request->get('id_producto'),
                    'nombre'=>$request->get('nombre_prod'),
                    'id_lista_precio'=>$request->id_listaPrecio,
                    'precio_costo'=> $request->precioCosto,
                    'margen'=> $request->margen,
                    'precio_venta'=> $request->precioVenta,
                    'descuento'=> $request->descuento,
                    'valor_venta_neto'=> $request->ventaNeto,
                    'precio_venta_final'=> $request->ventaFinal,
                    'id_bodega'=> $request->id_bodega,
                    'iva'=> $request->iva,
                    'otro_impuesto'=> $request->otroImpuesto,
                    'stock'=> $request->stock
                ]);
                return redirect('/ingresarprecio')->with('status','Registrado correctamente.');    
            }
        }catch(Exception $e){
            Log::error($e);
            return redirect('/ingresarprecio')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
