<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = DB::table('subcategorias')
            ->join('categorias', 'subcategorias.id_categoria', '=', 'categorias.id')
            ->select('subcategorias.id', 
            'subcategorias.nombre',
            'subcategorias.abreviatura',
            'categorias.nombre as categoria',
            'categorias.id as id_categoria')
            ->get();

        $categorias = Categoria::all();
        return view('Productos.mantSubcategoria')->with('tipos',$tipos)->with('categorias',$categorias);
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
            $tipo = Subcategoria::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo,
                'id_categoria' => $request->categoria_op
            ]);
    
            return redirect('/mantSubcategoria')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/mantSubcategoria')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update Subcategoria :". $id );
        try{
            Subcategoria::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit'),
                                        'id_categoria'=>$request->get('id_categoria')
                                        ]);
            Log::info("actualizado"); 
            return redirect('/mantSubcategoria')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantSubcategoria')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar Subcategoria : " . $id );
        
        try{
            $cat = Subcategoria::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/mantSubcategoria')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantSubcategoria')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
}
