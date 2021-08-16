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

class ProductoServicioController extends Controller
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
        
        return view ('Productos.productoServicio')->with('categorias',$categoria)->with('marcas',$marca)->with('tipoNegs',$tipoNeg)->with('tipoProds',$tipoProd)->with('unidades',$unidad);
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
        Log::info("store ProductoServicioController " . $request);
        $nombrefoto = $request->file('imglogo')->getClientOriginalName();
        $request->imglogo->move(public_path('imagenes'),$nombrefoto);
       
        $inventario = $request->inventario;
        if ($inventario == null){
            $inventario = 0;
        }else{
            $inventario = 1;
        }

        $venta = $request->estado_venta;
        if ($venta == null){
            $venta = 0;
        }else{
            $venta = 1;
        }

        $afecto = $request->afecto;
        if ($afecto == null){
            $afecto = 0;
        }else{
            $afecto = 1;
        }

        $otro_impuesto = $request->otro_impuesto;
        if ($otro_impuesto == null){
            $otro_impuesto = 0;
        }else{
            $otro_impuesto = 1;
        }


        try{
            $fichaProducto = FichaProductoServicio::create([

                'imagen'=> $nombrefoto,
                'nombre'=> $request->nombre,
                'sku'=> $request->sku,
                'codigo_barra'=> $request->codigo_barra,
                'unidad_medida'=> $request->unidad_medida,
                'inventario'=> $inventario,
                'estado_venta'=> $venta,
                'afecto'=> $afecto,
                'otro_impuesto'=> $otro_impuesto,
                'stock_critico'=> $request->stock_critico,
                'id_tipoProducto'=> $request->id_tipoProducto,
                'id_linea_negocio'=> $request->id_linea_negocio,
                'id_categoria'=> $request->id_categoria,
                'id_subcategoria'=> $request->id_subcategoria,
                'id_marca'=> $request->id_marca,
                'id_submarca'=> $request->id_submarca,
                'descripcion'=> $request->descripcion,
                'stock_maximo'=> $request->stock_maximo

            ]);
            
            return redirect('/prodyservicio')->with('status','Ficha creada con exito');
        }catch(Exception $e) {
            Log::alert($e);
            return redirect('/prodyservicio')->with('messageerror', 'Error al crear registro'); 
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

    public function findSubCat(Request $request){
        Log::info("findSubCat ProductoServicioController : " . $request->id_categoria);
        $data=Subcategoria::select('nombre','id')->where('id_categoria',$request->id_categoria)->take(100)->get();
        return response()->json($data);
    }

    public function findSubMarca(Request $request){
        Log::info("findSubMarca ProductoServicioController : " . $request->id_marca);
        $data=Submarca::select('nombre','id')->where('id_marca',$request->id_marca)->take(100)->get();
        return response()->json($data);
    }
}
