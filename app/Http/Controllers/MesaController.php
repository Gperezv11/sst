<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Patente;
use App\Models\Mesa;
use Illuminate\Support\Facades\Log;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Mesa::all();
        return view('RestoBar.mesa')->with('tipos',$tipos);
    
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
            $tipo = Mesa::create([
                'mesa' => $request->numeroMesa,
                'descripcion' => $request->detalle,
                'capacidad' => $request->capacidad,
                'estado' => $request->estado
            ]);
    
            return redirect('/mesa')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/mesa')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update mesa :". $id );
        try{
            Mesa::find($id)->update(['mesa'=>$request->get('numeroMesa_edit'),
                                        'descripcion'=>$request->get('descripcion_edit'),
                                        'capacidad'=>$request->get('capacidad_edit'),
                                        'nombre'=>$request->get('nombreTipo_edit'),
                                        'celular'=>$request->get('celularTipo_edit'),
                                        'email'=>$request->get('emailTipo_edit')
                                        ]);
            return redirect('/mesa')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mesa')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar mesa : " . $id );
        
        try{
            $cat = Mesa::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/mesa')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mesa')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    
}