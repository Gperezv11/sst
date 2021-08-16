<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Categoria::all();
        return view('Productos.mantCategoria')->with('tipos',$tipos);
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
        //dd($request);
        if ($request->hasFile('imglogo')) {
            $nombrefoto = $request->file('imglogo')->getClientOriginalName();
            $request->imglogo->move(public_path('imagenes'),$nombrefoto);
        }else{
            $nombrefoto = "";
        }

        try{
            $tipo = Categoria::create([
                'nombre' => $request->nombreTipo,
                'abreviatura' => $request->abreviaturaTipo,
                'imagen'=>$nombrefoto
            ]);
    
            return redirect('/mantCategoria')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/mantCategoria')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
         Log::info("funcion update :". $id );

         if ($request->hasFile('imglogo')) {
            $nombrefoto = $request->file('imglogo')->getClientOriginalName();
            $request->imglogo->move(public_path('imagenes'),$nombrefoto);
        }else{
            $nombrefoto = "";
        }
        //dd($request);
        try{
            Categoria::find($id)->update(['nombre'=>$request->get('nombreTipo_edit'), 
                                        'abreviatura'=>$request->get('abreviaturaTipo_edit'),
                                        'imagen' => $nombrefoto
                                        ]);
            Log::info("actualizado"); 
            return redirect('/mantCategoria')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantCategoria')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar categoria : " . $id );
        
        try{
            $cat = Categoria::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/mantCategoria')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/mantCategoria')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
}
