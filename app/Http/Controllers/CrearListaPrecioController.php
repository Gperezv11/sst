<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaPrecio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CrearListaPrecioController extends Controller
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
        $tipos = ListaPrecio::all();

        return view ('Ventas.crearListaPrecio')->with('tipos',$tipos);
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
            $tipo = ListaPrecio::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo
            ]);
    
            return redirect('/crearListaPrecio')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/crearListaPrecio')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update listado de precios :". $id );
        try{
            ListaPrecio::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit')
                                        ]);
            return redirect('/crearListaPrecio')->with('status','Registro actualizado correctamente.');
        }catch(Exception $e){
            Log::error($e);
            return redirect('/crearListaPrecio')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar listado de precios : " . $id );
        
        try{
            $cat = ListaPrecio::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/crearListaPrecio')->with('status','registro eliminado');
        }catch(Exception $e){
            Log::error($e);
            return redirect('/crearListaPrecio')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
}
