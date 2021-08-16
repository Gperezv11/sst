<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Submarca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubmarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = DB::table('submarcas')
            ->join('marcas', 'submarcas.id_marca', '=', 'marcas.id')
            ->select('submarcas.id', 
            'submarcas.nombre',
            'submarcas.abreviatura',
            'marcas.nombre as marca',
            'marcas.id as id_marca')
            ->get();

        $marcas = Marca::all();
        return view('Productos.mantSubmarca')->with('tipos',$tipos)->with('marcas',$marcas);
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
            $tipo = Submarca::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo,
                'id_marca' => $request->marca_op
            ]);
    
            return redirect('/mantSubmarca')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/mantSubmarca')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update Submarca :". $id );
        try{
            Submarca::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit'),
                                        'id_marca'=>$request->get('id_marca')
                                        ]);
            Log::info("actualizado"); 
            return redirect('/mantSubmarca')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantSubmarca')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar Submarca : " . $id );
        
        try{
            $cat = Submarca::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/mantSubmarca')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantSubmarca')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
}
