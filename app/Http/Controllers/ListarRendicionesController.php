<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Rendidores;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ListarRendicionesController extends Controller
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
        Log::info("index ListarrendidoresController");
        $reg = Region::all();
        $com = Comuna::all();
        
        $fichas = DB::table('rendidores')
            ->join('regions', 'region', '=', 'regions.id')
            ->join('comunas', 'comuna', '=', 'comunas.id')
            ->select('rendidores.id', 
            'rendidores.email',
            'rendidores.direccion',
            'rendidores.rut', 
            'rendidores.nombre', 
            'rendidores.telefono', 
            'rendidores.nacionalidad', 
            'rendidores.nombre_contacto', 
            'rendidores.telefono_contacto', 
            'rendidores.email_contacto', 
            'rendidores.cargo_contacto', 
            'rendidores.imagen', 
            'rendidores.created_at', 
            'rendidores.updated_at', 
            'rendidores.estado_ficha',
            'rendidores.region',
            'rendidores.comuna',
            'regions.nombre as nombre_region',
            'comunas.nombre as nombre_comuna')
            ->get();
        
        Log::info("fichas rendidores : " . $fichas);
        return view ('Rendiciones.listarRendiciones')->with('fichas', $fichas)->with('reg', $reg)->with('com',$com);
        
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
        Log::info("funcion update Rendidores :". $id);
        if ($request->file('imgInp')!=null){
            $nombrefoto = $request->file('imgInp')->getClientOriginalName();
            $request->imgInp->move(public_path('imagenes'),$nombrefoto);
          
            try{
                Rendidores::find($id)->update(['email'=>$request->get('email_edit_txt'),
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
                return redirect('/listarRendidores')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
                Log::error($e);
                return redirect('/listarRendidores')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
        }else{
            try{
                Rendidores::find($id)->update(['email'=>$request->get('email_edit_txt'),
                                            'direccion'=>$request->get('dire_edit_txt'),
                                            'telefono'=>$request->get('fono_edit_txt'), 
                                            'nacionalidad'=>$request->get('naci_cat'), 
                                            'region'=>$request->get('region_cat'), 
                                            'comuna'=>$request->get('comuna_cat'), 
                                            'nombre_contacto'=>$request->get('nomCont_edit_txt'), 
                                            'telefono_contacto'=>$request->get('fonoCont_edit_txt'), 
                                            'email_contacto'=>$request->get('emailCont_edit_txt'), 
                                            'cargo_contacto'=>$request->get('cargoCont_edit_txt')]);
                Log::info("actualizado"); 
                return redirect('/listarRendidores')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
                Log::error($e);
                return redirect('/listarRendidores')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion eliminar Proveedor : " . $id );
        
        try{
            $rut = Rendidores::find($id);
            $rut->delete();
            Log::info("eliminado :" . $rut);

            return redirect('/listarRendidores')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/listarRendidores')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    public function cambiarStatus(Request $request){
        Log::info("cambiarStatus Rendidor id: ". $request->id . " estado_ficha : " .$request->estadoficha);

        Rendidores::find($request->id)->update(['estado_ficha' =>$request->estadoficha]);
        Log::info("estado actualizado");
        return response()->json(['success'=>'Cambio con exito']);
    }
}
