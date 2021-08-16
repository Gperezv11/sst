<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Modelo;
use App\Models\Patente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = DB::table('modelos')
            ->join('vehiculos', 'modelos.id_marca', '=', 'vehiculos.id')
            ->select('modelos.id', 
            'modelos.nombre',
            'modelos.abreviatura',
            'vehiculos.nombre as marca',
            'vehiculos.id as id_marca')
            ->get();

        $vehiculos = Vehiculo::all();
        return view('Parking.modelo')->with('tipos',$tipos)->with('vehiculos',$vehiculos);
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
        //$tipos = Categoria::all();
        
        try{
            $tipo = Modelo::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo,
                'id_marca' => $request->marca_op
            ]);
    
            return redirect('/modelo')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/modelo')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update Modelo :". $id );
        try{
            Modelo::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit'),
                                        'id_marca'=>$request->get('id_marca')
                                        ]);
            Log::info("actualizado"); 
            return redirect('/modelo')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/modelo')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar Modelo : " . $id );
        
        try{
            $cat = Modelo::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/modelo')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/modelo')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
    public function findModelo(Request $request){
        Log::info("findModelo ModeloController : " . $request->id_marca);
        $data=Modelo::select('nombre','id')->where('id_marca',$request->id_marca)->take(100)->get();
        return response()->json($data);
    }
}