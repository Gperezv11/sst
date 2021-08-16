<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Patente;
use Illuminate\Support\Facades\Log;

class PatenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Patente::all();
        return view('Parking.patente')->with('tipos',$tipos);
    
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
            $tipo = Patente::create([
                'patente' => $request->patenteTipo,
                'marca' => $request->marcaTipo,
                'modelo' => $request->modeloTipo,
                'nombre' => $request->nombreTipo,
                'celular' => $request->celularTipo,
                'email' => $request->emailTipo
            ]);
    
            return redirect('/patente')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/patente')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update patente :". $id );
        try{
            Patente::find($id)->update(['patente'=>$request->get('patenteTipo_edit'),
                                        'marca'=>$request->get('marcaTipo_edit'),
                                        'modelo'=>$request->get('modeloTipo_edit'),
                                        'nombre'=>$request->get('nombreTipo_edit'),
                                        'celular'=>$request->get('celularTipo_edit'),
                                        'email'=>$request->get('emailTipo_edit')
                                        ]);
            return redirect('/patente')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/patente')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar pantente : " . $id );
        
        try{
            $cat = Patente::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/patente')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/patente')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
     public function findPatente(Request $request){
        Log::info("findPatente PatenteController : " . $request->id_patente);
        $data=Patentes::select('patente','id')->where('id_patente',$request->id_patente)->take(100)->get();
        return response()->json($data);
    }
    
}