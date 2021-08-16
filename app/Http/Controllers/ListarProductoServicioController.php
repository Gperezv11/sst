<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Subcategoria;
use App\Models\Submarca;
use App\Models\TipoNegocio;
use App\Models\TipoProducto;
use App\Models\UnidadMedida;
use App\Models\FichaProductoServicio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ListarProductoServicioController extends Controller
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
        Log::info("index ProductoServicioController");

        $categoria=Categoria::all();
        $marca = Marca::all();
        $tipoNeg = TipoNegocio::all();
        $tipoProd = TipoProducto::all();
        $unidad = UnidadMedida::all();
        $subcategoria = Subcategoria::all();
        $submarca = Submarca::all();
        
        $fichas = DB::table('ficha_producto_servicios')
            ->join('categorias', 'ficha_producto_servicios.id_categoria', '=', 'categorias.id')
            ->join('marcas', 'ficha_producto_servicios.id_marca', '=', 'marcas.id')
            ->join('subcategorias', 'ficha_producto_servicios.id_subcategoria', '=', 'subcategorias.id')
            ->join('submarcas', 'ficha_producto_servicios.id_submarca', '=', 'submarcas.id')
            ->join('tipo_negocios', 'ficha_producto_servicios.id_linea_negocio', '=', 'tipo_negocios.id')
            ->join('tipo_productos', 'ficha_producto_servicios.id_tipoProducto', '=', 'tipo_productos.id')
            ->join('unidad_medidas', 'ficha_producto_servicios.unidad_medida', '=', 'unidad_medidas.id')
            ->select('ficha_producto_servicios.id', 
            'ficha_producto_servicios.nombre',
            'ficha_producto_servicios.sku',
            'ficha_producto_servicios.codigo_barra', 
            'ficha_producto_servicios.imagen',
            'ficha_producto_servicios.unidad_medida', 
            'ficha_producto_servicios.inventario', 
            'ficha_producto_servicios.estado_venta', 
            'ficha_producto_servicios.afecto', 
            'ficha_producto_servicios.otro_impuesto', 
            'ficha_producto_servicios.stock_critico', 
            'ficha_producto_servicios.id_tipoProducto', 
            'ficha_producto_servicios.id_linea_negocio', 
            'ficha_producto_servicios.id_categoria', 
            'ficha_producto_servicios.id_subcategoria', 
            'ficha_producto_servicios.id_marca', 
            'ficha_producto_servicios.id_submarca', 
            'ficha_producto_servicios.id_marca', 
            'ficha_producto_servicios.id_submarca', 
            'ficha_producto_servicios.created_at', 
            'ficha_producto_servicios.updated_at', 
            'ficha_producto_servicios.descripcion',
            'ficha_producto_servicios.stock_maximo',
            'categorias.nombre as nombre_categoria',
            'marcas.nombre as nombre_marca',
            'subcategorias.nombre as nombre_subcategoria',
            'submarcas.nombre as nombre_submarca',
            'tipo_negocios.nombre as nombre_linea_negocio',
            'tipo_productos.nombre as nombre_tipoProducto',
            'unidad_medidas.nombre as nombre_medida')
            ->get();

        return view ('Productos.listarproductoServicio')->with('categorias',$categoria)->with('marcas',$marca)->with('tipoNegs',$tipoNeg)->with('tipoProds',$tipoProd)->with('unidades',$unidad)->with('subcategorias',$subcategoria)->with('submarcas',$submarca)->with('fichas',$fichas) ;
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
    public function update(Request  $request, $id)
    {   
        if ($request->file('imglogo')!=null){
            $nombrefoto = $request->file('imglogo')->getClientOriginalName();
            $request->imglogo->move(public_path('imagenes'),$nombrefoto);

            try{
                FichaProductoServicio::find($id)->update([
                                            'imagen'=>$nombrefoto,
                                            'nombre'=>$request->get('nombre'),
                                            'unidad_medida'=>$request->get('unidad_medida'),
                                            'stock_critico'=>$request->get('stock_critico'),
                                            'id_tipoProducto'=>$request->get('id_tipoProducto'),
                                            'id_linea_negocio'=>$request->get('id_linea_negocio'),
                                            'id_categoria'=>$request->get('id_categoria'),
                                            'id_subcategoria'=>$request->get('id_subcategoria'),
                                            'id_marca'=>$request->get('id_marca'),
                                            'id_submarca'=>$request->get('id_submarca'),
                                            'descripcion'=>$request->get('descripcion'),
                                            'stock_maximo'=>$request->get('stock_maximo')]);
                Log::info("actualizado"); 
    
                return redirect('/listProdyservicio')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
                Log::error($e);
                return redirect('/listProdyservicio')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
        }else{
            try{
                FichaProductoServicio::find($id)->update([
                                            'nombre'=>$request->get('nombre'),
                                            'unidad_medida'=>$request->get('unidad_medida'),
                                            'stock_critico'=>$request->get('stock_critico'),
                                            'id_tipoProducto'=>$request->get('id_tipoProducto'),
                                            'id_linea_negocio'=>$request->get('id_linea_negocio'),
                                            'id_categoria'=>$request->get('id_categoria'),
                                            'id_subcategoria'=>$request->get('id_subcategoria'),
                                            'id_marca'=>$request->get('id_marca'),
                                            'id_submarca'=>$request->get('id_submarca'),
                                            'descripcion'=>$request->get('descripcion'),
                                            'stock_maximo'=>$request->get('stock_maximo')]);
                Log::info("actualizado"); 
    
                return redirect('/listProdyservicio')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
                Log::error($e);
                return redirect('/listProdyservicio')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
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
        Log::info("funcion eliminar : " . $id );
        
        try{
            $producto = FichaProductoServicio::find($id);
        
            $producto->delete();
            //Log::info("eliminado ");
            return redirect('/listProdyservicio')->with('status','registro eliminado');
        }catch(Exception $e){
            Log::error($e);
            return redirect('/listProdyservicio')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    public function cambiarStatusInventario(Request $request){
        $inventario = $request->inventario;
        Log::info("estado inventario :" . $inventario);
        
        FichaProductoServicio::find($request->id)->update(['inventario' =>$inventario]);

        Log::info("estado inventario actualizado :" . $inventario);
        return response()->json(['success'=>'Cambio con exito']);
    }

    public function cambiarStatusVenta(Request $request){
        
        $venta = $request->estado_venta;
        Log::info("estado venta :" . $venta);
       
        FichaProductoServicio::find($request->id)->update(['estado_venta' =>$venta]);

        Log::info("estado venta actualizado :" . $venta);
        return response()->json(['success'=>'Cambio con exito']);
    }

    public function cambiarStatusAfecto(Request $request){
        
        $afecto = $request->afecto;
        Log::info("estado venta :" . $afecto);
       
        FichaProductoServicio::find($request->id)->update(['afecto' =>$afecto]);

        Log::info("estado venta actualizado :" . $afecto);
        return response()->json(['success'=>'Cambio con exito']);
    }


    public function cambiarStatusImpuesto(Request $request){
        
        $impuesto = $request->otro_impuesto;
        Log::info("otro impuesto :" . $impuesto);
       
        FichaProductoServicio::find($request->id)->update(['otro_impuesto' =>$impuesto]);

        Log::info("estado venta actualizado :" . $impuesto);
        return response()->json(['success'=>'Cambio con exito']);
    }
}
