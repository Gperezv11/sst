<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\Log;

class TipoProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoProducto::all();
        return view('Productos.mantTipoProducto')->with('tipos',$tipos);
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
        //$tipos = TipoProducto::all();
        
        try{
            $tipo = TipoProducto::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo
            ]);
    
            return redirect('/mantTipo')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/mantTipo')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update Tipo Producto :". $id );
        try{
            TipoProducto::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit')
                                        ]);
            Log::info("actualizado"); 
            return redirect('/mantTipo')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantTipo')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar Tipo producto : " . $id );
        
        try{
            $cat = TipoProducto::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/mantTipo')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantTipo')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
}
