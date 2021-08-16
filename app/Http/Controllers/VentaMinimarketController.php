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
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class VentaMinimarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //llenar lista de categorias
        $categorias = Categoria::all();
        $vendedores = Fichapersonal::all();

        $buscarProductos = FichaProductoServicio::all();
        
        $buscarProductos -> each(function($buscarProductos){
            $buscarProductos->fichaPrecio;
            $buscarProductos->categorias;
        });
        
                
        //dd($buscarProductos);
        //enviar fecha y hora para la comanda
        $now = Carbon::now();
        $fecha = $now->format('d-m-Y');
        $hora = $now->format('H:i');

       
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
                Log::info("n| de orden buscada : " . $order->id);
                $pedido = Pedido::where('comanda_id', $order->id)
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


        return view('POS.posMinimarket', compact('fecha','hora','buscarProductos','pedido','order','vendedores','categorias'));
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
            
            $numOrden = $request->get('numOrden');
            Log::info(" funcion store, el numero de orden es : " .   $numOrden);

            //obtener el maximo ID
            $order = Comanda::orderBy('id', 'desc')->first();
            // si es distinto creo una nueva comanda.
            
            Log::info(" maximo ID : " .   $order->id);
            
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
                ->where('comanda_id', $order->id)
                ->where('estado','1')->first();

                Log::info(" existe producto : " . $existe );
                
                //si $existe es null, entonces agrego el producto al pedido
                if(is_null($existe)){
                    $cantidad = $request->get('cantidad');
                    Log::info(" cantidad ingresada : " . $cantidad );
                    $precio_venta = $request->get('precio');
                    $total_pago = $precio_venta;
                    $descuento = $request->get('descuento');
                    Log::info(" descuento : " . $descuento );
                    $descuentoPerc = $request->get('tipoDscto');
                    $descuentoTipo = 0;

                    if($cantidad != 1){                        
                        $total_pago = $precio_venta * $cantidad;
                    }
                    if($descuento){
                        if($descuentoPerc ==  'peso'){
                            Log::info(" tipo descuento : " . $descuentoPerc );
                            $total_pago = $total_pago - $descuento;
                            Log::info("total a pago pesos : " . $total_pago );
                            $descuentoTipo = 0;
                        }else{ // si es porcentaje
                            Log::info(" tipo descuento : " . $descuentoPerc );
                            $descuentoAux = (($precio_venta * $cantidad) * $descuento)/100;
                            Log::info(" en $ el % de descuento : " . $descuentoAux );
                            $total_pago = $precio_venta - $descuentoAux;
                            Log::info(" total a pago con descuento : " . $total_pago );
                            $descuentoTipo = 1;
                        }
                        
                    }
                    
                    if($total_pago < 0){
                        $total_pago = 0;
                    }
                    Log::info("tipo descuento " . $descuentoTipo);
                    $pedido = Pedido::create([
                        'comanda_id' => $numOrden,
                        'producto_id'=> $request->get('producto_id'),
                        'cantidad'=> $cantidad,
                        'precio_venta'=> $precio_venta,
                        'total_pago'=> $total_pago ,
                        'descuento' => $descuento,
                        'tipo_descuento' => $descuentoTipo,
                        'comentario' => $request->get('comentario'),
                        'estado'=> '1'
                    ]);
                    
                    //update a comanda total pago y propina
                    $total = Pedido::where('estado','1')->where('comanda_id',$numOrden)->get()->sum('total_pago');
                    
                    $orden = Comanda::find($numOrden)
                    ->where ('estado','1')
                    ->update([
                        'total' => $total
                    ]);

                    return redirect('/posMini')->with('status','Agregado !.');

                }else{ // si ya esta en la orden agrego la nueva cantidad 
                    
                    $cantidadAdd = $request->get('cantidad');
                    $cantidad = $existe->cantidad;
                    $nuevo = $cantidad + $cantidadAdd;
                    $precio_venta = $request->get('precio');                    
                    $descuento = $request->get('descuento');
                    Log::info(" descuento : " . $descuento );
                    $descuentoPerc = $request->get('descuentoPerc');
                    $descuentoTipo = 0;

                    if($cantidad != 1){                        
                        $total_pago = $precio_venta * $cantidad;
                    }

                    if($descuento){

                        if($descuentoPerc ==  'peso'){
                            Log::info(" tipo descuento : " . $descuentoPerc );
                            $total_pago = $total_pago - $descuento;
                            Log::info("total a pago pesos : " . $total_pago );
                            $descuentoTipo = 0;
                        }else{ // si es porcentaje
                            Log::info(" tipo descuento : " . $descuentoPerc );
                            $descuentoAux = (($precio_venta * $cantidad) * $descuento)/100;
                            Log::info(" en $ el % de descuento : " . $descuentoAux );
                            $total_pago = $precio_venta - $descuentoAux;
                            Log::info(" total a pago con descuento : " . $total_pago );
                            $descuentoTipo = 0;
                        }
                    }

                    Log::info(" modificar Cantidad : " . $cantidadAdd . " + " . $cantidad . " = " . $nuevo);

                    Pedido::where('producto_id', $request->get('producto_id'))
                    ->where('comanda_id', $order->id)
                    ->where('id', $existe->id)
                    ->where('estado','1')
                    ->update([
                        'cantidad' => $nuevo,
                        'total_pago' => $nuevo * $request->get('precio'),
                        'precio_venta'=> $precio_venta,
                        'descuento' => $descuento,
                        'tipo_descuento' => $descuentoTipo,
                        'comentario' => $request->get('comentario')
                    ]);

                    //update a comanda total pago y propina
                    $total = Pedido::where('estado','1')->where('comanda_id',$order->id)->get()->sum('total_pago');
                    
                    $orden = Comanda::find($order->id)
                    ->where ('estado','1')
                    ->update([
                        'total' => $total
                    ]);

                    return redirect('/posMini')->with('status','Agregado a la orden');
                }
            }
        }catch(Exception $e){
            Log::error($e);
            return redirect('/posMini')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
            $cantidad = $request->get('cantidad');
            Log::info(" cantidad ingresada : " . $cantidad );
            $precio_venta = $request->get('precio');
            $total_pago = $precio_venta;
            $descuento = $request->get('descuentoEdit');
            Log::info(" descuento : " . $descuento );
            $descuentoTipo = $request->get('tipoDscto');
            $dstoTipo = 0;

            if($descuento){

                if($descuentoTipo ==  'peso'){
                    Log::info(" tipo descuento : " . $descuentoTipo );
                    $total_pago = ($total_pago * $cantidad) - $descuento;
                    Log::info("total a pago pesos : " . $total_pago );
                }else{ // si es porcentaje
                    Log::info(" tipo descuento : " . $descuentoTipo );
                    $descuentoAux = (($precio_venta * $cantidad) * $descuento)/100;
                    Log::info(" en $ el % de descuento : " . $descuentoAux );
                    $total_pago = ($precio_venta * $cantidad) - $descuentoAux;
                    Log::info(" total a pago con descuento : " . $total_pago );
                    $dstoTipo = 1;
                }
            }else{
                $total_pago = $total_pago * $cantidad;
                $descuento = 0;
            }
            // actualizo cantidad y comentario
            $idExiste = Pedido::find($id)
            ->where('estado', '=', '1')
            ->where('producto_id', $request->get('producto_id'))
            ->update([
                'cantidad' => $cantidad,
                'comentario' => $request->get('comentario'),
                'total_pago' => $total_pago,
                'descuento' => $descuento,
                'tipo_descuento' => $dstoTipo,
                'comentario' => $request->get('comentario')
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
                $descuentos = Pedido::where('estado','1')->where('comanda_id',$pedido->comanda_id)->get()->sum('descuento');

                $orden = Comanda::find($pedido->comanda_id)
                ->where ('estado','1')
                ->update([
                    'total' => $total
                ]);
                Log::info (" actualizo el total y total de descuentos aplicados");

                return redirect('/posMini')->with('status','Pedido actualizado');
            }else{
                return redirect('/posMini')->with('messageerror','No se ha actualizado el pedido');
            }
                
    
        }catch(Exception $e) {
            Log::alert($e);
            return redirect('/posMini')->with('messageerror', 'Error al actualizar el  registro'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Log::info("funcion eliminar producto del pedido : " . $id );
        
        try{
            $cat = Pedido::find($id);
            if ($cat){
                
                $pedido = Pedido::find($id)
                ->where('producto_id',$request->get('idProducto'))
                ->where ('estado','1')
                ->update([
                    'estado' => 2,
                    'comentario' => $request->get('comentarioEliminacion')
                ]);

                //update a comanda total pago y propina
                $total = Pedido::where('estado','1')->where('comanda_id',$cat->comanda_id)->get()->sum('total_pago');
                $totalDscto = Pedido::where('estado','1')->where('comanda_id',$cat->comanda_id)->get()->sum('descuento');
                $total = $total - $totalDscto;

                $orden = Comanda::find($cat->comanda_id)
                ->where ('estado','1')
                ->update([
                    'total' => $total
                ]);
                Log::info (" actualizo total : " .$total);

                return redirect('/posMini')->with('status','eliminado');
            }else{
                return redirect('/posMini')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
            }
        }catch(Exception $e){
            Log::error($e);
            return redirect('/posMini')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id -> de la comanda
     * @return \Illuminate\Http\Response
     */
    public function finalizarPedido(Request $request)
    {
                
        try{
            $descuento = $request->get('dscto');
            $tipoDscto = $request ->get('tipo');
            $id = $request->get('id');
            $tipo = 0;
            // total a pago
            $total = Pedido::where('estado','1')->where('comanda_id',$id)->get()->sum('total_pago');

            if ($descuento){
                if($tipoDscto == 'peso'){
                    $total = $total - $descuento;
                    $tipo = 0;
                }else{
                    if($tipoDscto == 'porcentaje'){
                        $total = $total - (($total * $descuento)/100);
                        $tipo = 1;
                    }
                }
            }
            
            Log::info ("id : " . $id . " descuento : " . $descuento . " tipoDscto : " . $tipoDscto );

        
            // actualizo el estado del pedido a 3 que significa procesado
            
            $idExiste = Pedido::where('estado', '1')
                                ->where('comanda_id',$id)
                                ->update([
                                    'estado' => '3',
                                ]);
 
            //Log::info ("encontro ? " . $idExiste);
            // si se realizo correctamente entonces proceso la comanda, estado = 3
            if ($idExiste >= 1) {
                $idExiste = comanda::find($id)
                            ->where('estado', '=', '1')
                            ->update([
                                'estado' => '3',
                                'descuento' => $descuento,
                                'total' => $total,
                                'tipo_descuento' => $tipo
                            ]);
                    //return redirect('/imprimirOrden/index/', ['id' => $id]);
                    //return redirect(route('imprimirOrden',[$id]));
                echo 'listo';
            }else{
                
                echo 'error';
            }
                
        }catch(Exception $e) {
            Log::alert($e);
            return redirect('/posMini')->with('messageerror','No se ha actualizado el registro BD');
        }
    }

    /**
     * recibo el ID de la tabla comanda
     */

    public function eliminarPedido($id)
    {
        Log::info("funcion cancelar todos los pedidos de la orden : " . $id );
        
        try{
            //Pedido y comanda se dejan en estado 4 = cancelado
            $cat = Pedido::where('comanda_id',$id)
                    ->update([
                        'estado' => '4',
                    ]);
            if($cat){
                $comanda = Comanda::where('id',$id)
                    ->update([
                        'estado' => '4',
                    ]);
            }
 
            if($cat){
                return redirect('/posMini')->with('status','Eliminado');
            }else{
                return redirect('/posMini')->with('messageerror','No ha sido posible eliminar el pedido');
            }

            
        }catch(Exception $e){
            Log::error($e);
            return redirect('/posMini')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }


    /**
     * recibo el ID de la tabla comanda y busco un producto por SKU agrego al pedido
     */

    public function buscarProducto(Request $request, $id)
    {
        Log::info("funcion buscarProducto para orden : " . $id );
        //dd($request);
        $buscar = $request->get('buscarProd');
        try{
            $findProducto = FichaProductoServicio::where('sku',$buscar)
                                        ->orWhere('codigo_barra',$buscar)
                                        ->orWhere('nombre',$buscar)
                                        ->first();
           

            if($findProducto){
                $findProducto -> each(function($findProducto){
                    $findProducto->fichaPrecio;
                });
                Log::info("findProducto producto : " . $findProducto );

                $fichaPrecio = ProductoPrecio::where('id_producto', $findProducto->id)
                                            ->first();
                if($fichaPrecio){
                    Log::info("fichaPrecio : " . $fichaPrecio );

                    $precio_venta = $fichaPrecio->precio_venta_final;
                    

                    

                    $prodPedido = Pedido::where('producto_id',$findProducto->id)
                                        ->where('comanda_id',$id)
                                        ->first();
                    if($prodPedido){// si ya existe agrego cantidad
                        $cantidad = $prodPedido->cantidad +1;
                        $descuento = $prodPedido->descuento;
                        $tipoDscto = $prodPedido->tipo_descuento;
                        $total = $precio_venta * $cantidad;

                        if ($descuento){
                            if($tipoDscto == 0){
                                $total = $total - $descuento;
                            }else{
                                if($tipoDscto == 1){
                                    $total = $total - (($total * $descuento)/100);
                                }
                            }
                        }
                        Log::info("precio producto : " . $precio_venta . " tiene descuento " . $descuento . " tipo : " . $tipoDscto );
                        $idExiste = Pedido::where('comanda_id',$id)
                                        ->where('producto_id', $findProducto->id)
                                        ->update([
                                            'cantidad' => $cantidad,
                                            'total_pago' => $total
                        ]);            
                        
                        if($idExiste){
                            //update a comanda total pago y propina
                            $total = Pedido::where('estado','1')->where('comanda_id',$id)->get()->sum('total_pago');
                            Log::info("total : " . $total );
                            $orden = Comanda::find($id)
                            ->where ('estado','1')
                            ->OrWhere ('estado','2')
                            ->update([                    
                                'total' => $total,
                                'estado' => '1'
                            ]);
                        
                            return redirect('/posMini')->with('status','Agregado');
                        }
                        
                    }else{ // si no esta lo agrego
                        $pedido = Pedido::create([
                            'comanda_id' => $id,
                            'producto_id'=> $findProducto->id,
                            'cantidad'=> '1',
                            'precio_venta'=> $precio_venta,
                            'total_pago'=> $precio_venta ,
                            'estado'=> '1'
                        ]);
                        
                        //update a comanda total pago y propina
                        $total = Pedido::where('estado','1')->where('comanda_id',$id)->get()->sum('total_pago');
                        Log::info("total : " . $total );
                        $orden = Comanda::find($id)
                        ->where ('estado','1')
                        ->OrWhere ('estado','2')
                        ->update([                    
                            'total' => $total,
                            'estado' => '1'
                        ]);
                    
                        return redirect('/posMini')->with('status','Agregado');
                    }                    
                }else{
                    return redirect('/posMini')->with('messageerror','No ha encontrado el producto');   
                }
            }else{
                return redirect('/posMini')->with('messageerror','No ha encontrado el producto');           
            } 
        
        }catch(Exception $e){
            Log::error($e);
            return redirect('/posMini')->with('messageerror','Intente nuevamente');
        }
    }

    function fetch(Request $request){
        if($request->get('query')){
            $query = $request->get('query');

            $data  = DB::table('ficha_producto_servicios')
                            ->join('producto_precios', 'ficha_producto_servicios.id', '=', 'producto_precios.id_producto')
                            ->select('ficha_producto_servicios.id', 
                            'ficha_producto_servicios.nombre',
                            'ficha_producto_servicios.imagen',
                            'producto_precios.precio_venta_final')
                            ->where('producto_precios.id_bodega','1')
                            ->where('producto_precios.id_lista_precio','1')
                            ->where('ficha_producto_servicios.nombre','LIKE',"%$query%")
                            ->Orwhere('ficha_producto_servicios.sku','LIKE',"%$query%")
                            ->Orwhere('ficha_producto_servicios.codigo_barra','LIKE',"%$query%")
                            ->get();
                                    
            $output = '<ul class="dropdown-menu" style="display:block;width: 392px;overflow-y: scroll">';
            foreach($data as $row){
                $output .= '<li> <img id="blah" src="imagenes/'.$row->imagen.'" class="rounded float-start" alt="1" height="70px" width="70px"> <a href="#">'.$row->nombre.' $ '.$row->precio_venta_final .'</a></li>';
                
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    
    

}
