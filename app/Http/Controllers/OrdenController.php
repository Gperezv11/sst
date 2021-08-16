<?php

namespace App\Http\Controllers;
use App\Models\orden;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ListaPrecio;
use App\Models\ProductoPrecio;
use App\Models\FichaProductoServicio;
use App\Models\Comanda;
use App\Models\Pedido;
use App\Models\Bodega;
use App\Models\Fichapersonal;
use Illuminate\Support\Facades\Log;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //llena lista de precios
        $listaPrecios=ListaPrecio::all();
        //llena lista de bodegas
        $bodegas = Bodega::all();

        $vendedores = Fichapersonal::all();

        //enviar fecha y hora para la comanda
        $now = Carbon::now();
        $fecha = $now->format('d-m-Y');
        $hora = $now->format('H:i');

        //busqueda de productos
            //variables
        $listaElejida  = $request->get('id_lista_precio');
        $bodegaElejida = $request->get('bodega_id');
        $busqueda      = $request->get('buscarNombre');
        
        Log::info(" lista  :" . $listaElejida . " bodega : " . $bodegaElejida );


        // obtengo el max id en estado 2 creado
        $order = Comanda::orderBy('id', 'desc')
                ->where('estado','2')
                ->first();
                Log::info(" imprimir order = 2 " . $order );

        if (is_null($order)){
            Log::info(" entro a null de estado 2");
            //busco comandas en estado = 1 pendiente
            $order = Comanda::orderBy('id', 'desc')
                    ->where('estado','1')
                    ->first();
                    
                    Log::info(" imprimir order = 1 " . $order );

            if(is_null($order)){
                Log::info(" entro a null de estado 1");
                //si no existe comanda pendiente ni creada, creo una en estado 2
                $order = Comanda::create([
                    'estado'=>'2'
                ]);
                $pedido = array();
                Log::info("creo comanda en estado 2" . $order);
            }else{
                Log::info(" entro al estado 1");
                // traigo los pedidos pendiente asociadas a la orden pendiente
                $pedido = Pedido::buscarComanda($order->id)
                ->where('estado','1')
                ->get();

                $pedido ->each(function($pedido){
                        $pedido->producto;
                });
                
                Log::info("variable pedidos : " . $pedido);
 
                 //cargo listas seleccionadas
                $listaElejida  = $order->lista_precio_id;
                $bodegaElejida = $order->bodega_id;
                
                //Log::info(" imprimo listas " . $order->lista_precio_id . "  y bodega  " . $order->bodega_id );
            
            }  
        }else{
            Log::info("hay comanda en estado 2" . $order);
            $pedido = array();
        }

        //busqueda de productos
        if ($busqueda || $listaElejida || $bodegaElejida){
            $buscarProducto = ProductoPrecio::productoNombre($busqueda)
            ->lista($listaElejida)
            ->buscaBodega($bodegaElejida)
            ->get();

            $buscarProducto ->each(function($buscarProducto){
                $buscarProducto->fichaPrecio;
            });
            
            
            $orden = Comanda::find($order->id)
                ->where ('estado','2')
                ->update([
                    'lista_precio_id' => $request->get('id_lista_precio'),
                    'bodega_id' => $request->get('bodega_id')
                ]);
            
        }else{
            // cargo vacio para primera pantalla
            $buscarProducto = array();
            $pedido = array();
        }

        return view('POS.orden', compact('fecha','hora','listaPrecios','bodegas','buscarProducto','busqueda','pedido','order','vendedores'))->with('listaElejida',$listaElejida)->with('bodegaElejida',$bodegaElejida);
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
        try{
            
            $numOrden = $request->get('orden_id');
            Log::info(" funcion store, el numero de orden es : " .   $numOrden);

            //obtener el maximo ID
            $order = Comanda::orderBy('id', 'desc')->first();
            // si es distinto creo una nueva comanda.
            
            Log::info(" maximo ID : " .   $order->id);
            
            Log::info(" LISTA PRECIO :" . $request->get('id_lista_precio') . " BODEGA : " . $request->get('bodega_id') );
            
            if ($numOrden == $order->id){
                //actualizo el estado creada a pendiente
                $orden = Comanda::find($numOrden)
                ->where ('estado','2')
                ->update([
                    'estado'=>'1'
                ]);
                
                Log::info(" actualizo comanda a pendiente." );

                //agrego al pedido
                $existe = Pedido::where('producto_id', $request->get('producto_id'))
                ->where('comanda_id', $order->id)->first();

                Log::info(" existe producto : " . $existe );
                
                //si $existe es null, entonces agrego el producto al pedido
                if(is_null($existe)){
                    Log::info("crear pedido en la orden  ");
                    $pedido = Pedido::create([
                        'comanda_id' => $numOrden,
                        'producto_id'=> $request->get('producto_id'),
                        'cantidad'=> $request->get('cantidad'),
                        'precio_venta'=> $request->get('precio'),
                        'comentario'=> $request->get('comentario'),
                        'total_pago'=> $request->get('precio') * $request->get('cantidad') ,
                        'estado'=> '1'
                    ]);
                    
                    //update a comanda total pago y propina
                    $total = Pedido::where('estado','1')->where('comanda_id',$numOrden)->get()->sum('total_pago');
                    $propina = $total * 0.1;

                    $orden = Comanda::find($numOrden)
                    ->where ('estado','1')
                    ->update([
                        'propina' => $propina,
                        'total' => $total
                    ]);

                    return redirect('/orden')->with('status','Agregado !.');

                }else{
                    // si ya esta en la orden agrego la nueva cantidad 
                    $cantidadAdd = $request->get('cantidad');
                    $cantidad = $existe->cantidad;
                    $nuevo = $cantidad + $cantidadAdd;

                    Log::info(" modificar Cantidad : " . $cantidadAdd . " + " . $cantidad . " = " . $nuevo);

                    Pedido::where('producto_id', $request->get('producto_id'))
                    ->where('comanda_id', $order->id)
                    ->where('id', $existe->id)
                    ->where('estado','1')
                    ->update([
                        'cantidad' => $nuevo,
                        'total_pago' => $nuevo * $request->get('precio')
                    ]);

                    //update a comanda total pago y propina
                    $total = Pedido::where('estado','1')->where('comanda_id',$order->id)->get()->sum('total_pago');
                    $propina = $total * 0.1;

                    $orden = Comanda::find($order->id)
                    ->where ('estado','1')
                    ->update([
                        'propina' => $propina,
                        'total' => $total
                    ]);

                    return redirect('/orden')->with('status','Agregado a la orden');
                }
            }
        }catch(Exception $e){
            Log::error($e);
            return redirect('/orden')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        $producto = $request->get('producto_id');
        Log::info("funcion actualizar cantidad y comentario del pedido : " . $id . " producto : " . $producto);
        
        try{
            // actualizo cantidad y comentario
            $idExiste = Pedido::find($id)
            ->where('estado', '=', '1')
            ->where('producto_id', $request->get('producto_id'))
            ->update([
                'cantidad' => $request->get('cantidad'),
                'comentario' => $request->get('comentario'),
                'total_pago' => $request->get('cantidad')*$request->get('precio')
            ]);            
 
            Log::info ("encontro ? " . $idExiste . " id : " . $id );
            
            // si se realizo correctamente actualizo total pago y propina
            if ($idExiste == 1) {

                //update a comanda total pago y propina en COMANDAS
                $pedido = Pedido::where('id',$id)
                ->where('producto_id', $request->get('producto_id'))
                ->where('estado', '1')
                ->first();

                $total = Pedido::where('estado','1')->where('comanda_id',$pedido->comanda_id)->get()->sum('total_pago');
                $propina = $total * 0.1;

                $orden = Comanda::find($pedido->comanda_id)
                ->where ('estado','1')
                ->update([
                    'propina' => $propina,
                    'total' => $total
                ]);
                Log::info (" actualizo total y propina");

                return redirect('/orden')->with('status','Pedido actualizado');
            }else{
                return redirect('/orden')->with('messageerror','No se ha actualizado el pedido');
            }
                
    
        }catch(Exception $e) {
            Log::alert($e);
            return redirect('/orden')->with('messageerror', 'Error al actualizar el  registro'); 
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
        Log::info("funcion eliminar producto del pedido : " . $id );
        
        try{
            $cat = Pedido::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            //update a comanda total pago y propina
            $total = Pedido::where('estado','1')->where('comanda_id',$cat->comanda_id)->get()->sum('total_pago');
            $propina = $total * 0.1;

            $orden = Comanda::find($cat->comanda_id)
            ->where ('estado','1')
            ->update([
                'propina' => $propina,
                'total' => $total
            ]);
            Log::info (" actualizo total y propina : " );

            return redirect('/orden')->with('status','eliminado');
        }catch(Exception $e){
            Log::error($e);
            return redirect('/orden')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id -> de la comanda
     * @return \Illuminate\Http\Response
     */
    public function finalizarPedido(Request $request,$id)
    {
        
        Log::info("funcion finalizar el pedido " . $id );
        
        try{
            $dejapropina = $request->get('dejaPropina');
            $medioPago = $request->get('medioPago');

            Log::info(" Medio de pago :" . $medioPago . " propina : " . $dejapropina );

            
            // total a pago
            $total = Pedido::where('estado','1')->where('comanda_id',$id)->get()->sum('total_pago');
            $propina = $total * 0.1;

            Log::info(" total a pago :" . $total . " propina : " . $propina );
            
            if ($dejapropina){
                Log::info("propina on" );
            }else{
                $propina = 0;
                Log::info("propina OFF" );
            }

            // actualizo el estado del pedido a 3 que significa procesado
            
            $idExiste = Pedido::where('estado', '1')
            ->where('comanda_id',$id)
            ->update([
                'estado' => '3',
            ]);
 
            Log::info ("encontro ? " . $idExiste);
            // si se realizo correctamente entonces proceso la comanda, estado = 3
                if ($idExiste >= 1) {
                    $idExiste = comanda::find($id)
                    ->where('estado', '=', '1')
                    ->update([
                        'estado' => '3',
                        'propina' => $propina,
                        'total' => $total,
                        'medio_pago' => $medioPago,

                    ]);
                    //return redirect('/imprimirOrden/index/', ['id' => $id]);
                    return redirect(route('imprimirOrden',[$id]));
                }else{
                    return redirect('/orden')->with('messageerror','No se ha actualizado el registro ');
                }
                
        }catch(Exception $e) {
            Log::alert($e);
            return redirect('/orden')->with('messageerror','No se ha actualizado el registro BD');
        }
    }

    /**
     * recibo el ID de la tabla comanda
     */

    public function eliminarPedido($id)
    {
        Log::info("funcion eliminar todos los pedidos de la orden : " . $id );
        
        try{
            $cat = Pedido::where('comanda_id',$id);
            $cat->delete();

            if($cat){
                return redirect('/orden')->with('status','Eliminado');
            }else{
                return redirect('/orden')->with('messageerror','No ha sido posible eliminar el pedido');
            }

            
        }catch(Exception $e){
            Log::error($e);
            return redirect('/orden')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

}
