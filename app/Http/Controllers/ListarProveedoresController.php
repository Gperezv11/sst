<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Proveedores;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ListarProveedoresController extends Controller
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
        Log::info("index ListarProveedoresController");
        $reg = Region::all();
        $com = Comuna::all();
        
        $fichas = DB::table('proveedores')
            ->join('regions', 'region', '=', 'regions.id')
            ->join('comunas', 'comuna', '=', 'comunas.id')
            ->select('proveedores.id', 
            'proveedores.email',
            'proveedores.direccion',
            'proveedores.rut', 
            'proveedores.nombre', 
            'proveedores.telefono', 
            'proveedores.nacionalidad', 
            'proveedores.nombre_contacto', 
            'proveedores.telefono_contacto', 
            'proveedores.email_contacto', 
            'proveedores.cargo_contacto', 
            'proveedores.imagen', 
            'proveedores.created_at', 
            'proveedores.updated_at', 
            'proveedores.estado_ficha',
            'proveedores.region',
            'proveedores.comuna',
            'regions.nombre as nombre_region',
            'comunas.nombre as nombre_comuna')
            ->get();
        
        Log::info("fichas proveedores : " . $fichas);
        return view ('Compras.listarProveedores')->with('fichas', $fichas)->with('reg', $reg)->with('com',$com);
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
        Log::info("funcion update Proveedores :". $id);
        try{
            Proveedores::find($id)->update(['email'=>$request->get('email_edit_txt'),
                                        'direccion'=>$request->get('dire_edit_txt'),
                                        'telefono'=>$request->get('fono_edit_txt'), 
                                        'nacionalidad'=>$request->get('naci_cat'), 
                                        'region'=>$request->get('region_cat'), 
                                        'comuna'=>$request->get('comuna_cat'), 
                                        'nombre_contacto'=>$request->get('nomCont_edit_txt'), 
                                        'telefono_contacto'=>$request->get('fonoCont_edit_txt'), 
                                        'email_contacto'=>$request->get('emailCont_edit_txt'), 
                                        'cargo_contacto'=>$request->get('cargoCont_edit_txt'), 
                                        'imagen'=>$request->get('imgInp')]);
            Log::info("actualizado"); 
            return redirect('/listarProveedores')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/listarProveedores')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
            $rut = Proveedores::find($id);
            $rut->delete();
            Log::info("eliminado :" . $rut);

            return redirect('/listarProveedores')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/listarProveedores')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    public function cambiarStatus(Request $request){
        Log::info("cambiarStatusRendidor id: ". $request->id . " estado_ficha : " .$request->estadoficha);

        Rendidores::find($request->id)->update(['estado_ficha' =>$request->estadoficha]);
        Log::info("estado actualizado");
        return response()->json(['success'=>'Cambio con exito']);
    }
}
