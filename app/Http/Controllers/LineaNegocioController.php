<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoNegocio;
use Illuminate\Support\Facades\Log;

class LineaNegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoNegocio::all();
        return view('Productos.mantLineaNeg')->with('tipos',$tipos);
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
        //$tipos = TipoNegocio::all();
        
        try{
            $tipo = TipoNegocio::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo
            ]);
    
            return redirect('/mantLineaNeg')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/mantLineaNeg')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update TipoNegocio :". $id );
        try{
            TipoNegocio::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit')
                                        ]);
            Log::info("actualizado"); 
            return redirect('/mantLineaNeg')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantLineaNeg')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar linea de negocio : " . $id );
        
        try{
            $cat = TipoNegocio::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/mantLineaNeg')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantLineaNeg')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
}
