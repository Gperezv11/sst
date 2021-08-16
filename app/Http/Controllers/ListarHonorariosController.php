<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Prestadores;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ListarHonorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info("index ListarHonorariosController");
        $reg = Region::all();
        $com = Comuna::all();
        
        $fichas = DB::table('prestadores')
            ->join('regions', 'region', '=', 'regions.id')
            ->join('comunas', 'comuna', '=', 'comunas.id')
            ->select('prestadores.id', 
            'prestadores.email',
            'prestadores.direccion',
            'prestadores.rut', 
            'prestadores.nombre', 
            'prestadores.telefono', 
            'prestadores.nacionalidad', 
            'prestadores.nombre_contacto', 
            'prestadores.telefono_contacto', 
            'prestadores.email_contacto', 
            'prestadores.cargo_contacto', 
            'prestadores.imagen', 
            'prestadores.created_at', 
            'prestadores.updated_at', 
            'prestadores.estado_ficha',
            'prestadores.region',
            'prestadores.comuna',
            'regions.nombre as nombre_region',
            'comunas.nombre as nombre_comuna')
            ->get();
        
        Log::info("fichas Prestadores : " . $fichas);
        return view ('/Honorarios.listarHonorarios')->with('fichas', $fichas)->with('reg', $reg)->with('com',$com);
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
        //
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
        Log::info("funcion update Prestadores :". $id);
        if ($request->file('imgInp')!=null){
            $nombrefoto = $request->file('imgInp')->getClientOriginalName();
            $request->imgInp->move(public_path('imagenes'),$nombrefoto);
          
            try{
                Prestadores::find($id)->update(['email'=>$request->get('email_edit_txt'),
                                            'direccion'=>$request->get('dire_edit_txt'),
                                            'telefono'=>$request->get('fono_edit_txt'), 
                                            'nacionalidad'=>$request->get('naci_cat'), 
                                            'region'=>$request->get('region_cat'), 
                                            'comuna'=>$request->get('comuna_cat'), 
                                            'nombre_contacto'=>$request->get('nomCont_edit_txt'), 
                                            'telefono_contacto'=>$request->get('fonoCont_edit_txt'), 
                                            'email_contacto'=>$request->get('emailCont_edit_txt'), 
                                            'cargo_contacto'=>$request->get('cargoCont_edit_txt'), 
                                            'imagen'=>$nombrefoto]);
                Log::info("actualizado"); 
                return redirect('/listarPrestadores')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
                Log::error($e);
                return redirect('/listarPrestadores')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
        }else{
            try{
                Prestadores::find($id)->update(['email'=>$request->get('email_edit_txt'),
                                            'direccion'=>$request->get('dire_edit_txt'),
                                            'telefono'=>$request->get('fono_edit_txt'), 
                                            'nacionalidad'=>$request->get('naci_cat'), 
                                            'region'=>$request->get('region_cat'), 
                                            'comuna'=>$request->get('comuna_cat'), 
                                            'nombre_contacto'=>$request->get('nomCont_edit_txt'), 
                                            'telefono_contacto'=>$request->get('fonoCont_edit_txt'), 
                                            'email_contacto'=>$request->get('emailCont_edit_txt'), 
                                            'cargo_contacto'=>$request->get('cargoCont_edit_txt')
                                            ]);
                Log::info("actualizado"); 
                return redirect('/listarPrestadores')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
                Log::error($e);
                return redirect('/listarPrestadores')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
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
        Log::info("funcion eliminar Prestador : " . $id );
        
        try{
            $rut = Prestadores::find($id);
            $rut->delete();
            Log::info("eliminado :" . $rut);

            return redirect('/listarPrestadores')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/listarPrestadores')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
 /**
     * Cambia estado de ficha del registro.
     *
     * 
     */
    public function cambiarStatusPres(Request $request){
        Log::info("cambiarStatusPrestador id: ". $request->id . " estado_ficha : " .$request->estadoficha);

        Prestadores::find($request->id)->update(['estado_ficha' =>$request->estadoficha]);
        Log::info("estado actualizado");
        return response()->json(['success'=>'Cambio con exito']);
    }
}
