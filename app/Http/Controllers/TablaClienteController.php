<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Fichacliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class TablaClienteController extends Controller
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
        $reg = Region::all();
        $com = Comuna::all();
        //$fichas = Fichacliente::all();

        $fichas = DB::table('fichaclientes')
            ->join('regions', 'region', '=', 'regions.id')
            ->join('comunas', 'comuna', '=', 'comunas.id')
            ->select('fichaclientes.id', 
            'fichaclientes.email',
            'fichaclientes.direccion',
            'fichaclientes.rut', 
            'fichaclientes.nombre_cliente', 
            'fichaclientes.telefono', 
            'fichaclientes.nacionalidad', 
            'fichaclientes.giro', 
            'fichaclientes.cod_actividad', 
            'fichaclientes.sucursal', 
            'fichaclientes.rut_rep_legal', 
            'fichaclientes.nombre_rep_legal', 
            'fichaclientes.nombre_sucursal', 
            'fichaclientes.codigo_sucursal', 
            'fichaclientes.encargado_sucursal', 
            'fichaclientes.region_sucursal', 
            'fichaclientes.comuna_sucursal', 
            'fichaclientes.direccion_sucursal', 
            'fichaclientes.nombre_contacto', 
            'fichaclientes.telefono_contacto', 
            'fichaclientes.email_contacto', 
            'fichaclientes.cargo_contacto', 
            'fichaclientes.imagen', 
            'fichaclientes.created_at', 
            'fichaclientes.updated_at', 
            'fichaclientes.estadoficha',
            'fichaclientes.region',
            'fichaclientes.comuna',
            'regions.nombre as nombre_region',
            'comunas.nombre as nombre_comuna')
            ->get();

            
       // $fichas = Fichacliente::where()->get();
        return view('Ventas.listacliente')->with('fichas', $fichas)->with('reg', $reg)->with('com',$com); 
    }

    public function findComuna(Request $request){
        
        Log::info("funcion findComuna region :" . $request->id );

        $data=Comuna::select('nombre','id')->where('region_id',$request->id)->take(100)->get();

        return response()->json($data);
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
        Log::info("funcion update :". $id );

        if ($request->file('imgInp')!=null){
            $nombrefoto = $request->file('imgInp')->getClientOriginalName();
            $request->imgInp->move(public_path('imagenes'),$nombrefoto);
            try{
                Fichacliente::find($id)->update(['email'=>$request->get('email_edit_txt'),
                    'direccion'=>$request->get('dire_edit_txt'),
                    'telefono'=>$request->get('fono_edit_txt'), 
                    'nacionalidad'=>$request->get('naci_cat'), 
                    'region'=>$request->get('region_cat'), 
                    'comuna'=>$request->get('comuna_cat'), 
                    'giro'=>$request->get('giro_edit_txt'), 
                    'cod_actividad'=>$request->get('codSucAct_edit_txt'), 
                    'sucursal'=>$request->get('sucSii_edit_txt'), 
                    'rut_rep_legal'=>$request->get('rutRep_edit_txt'), 
                    'nombre_rep_legal'=>$request->get('nomRep_edit_txt'), 
                    'nombre_sucursal'=>$request->get('nomSuc_edit_txt'), 
                    'codigo_sucursal'=>$request->get('codSuc_edit_txt'), 
                    'encargado_sucursal'=>$request->get('encargado_edit_txt'), 
                    'region_sucursal'=>$request->get('regionsuc_cat'), 
                    'comuna_sucursal'=>$request->get('comunasuc_cat'), 
                    'direccion_sucursal'=>$request->get('direSuc_edit_txt'), 
                    'nombre_contacto'=>$request->get('nomCont_edit_txt'), 
                    'telefono_contacto'=>$request->get('fonoCont_edit_txt'), 
                    'email_contacto'=>$request->get('emailCont_edit_txt'), 
                    'cargo_contacto'=>$request->get('cargoCont_edit_txt'), 
                    'imagen'=>$nombrefoto]);
                Log::info("actualizado : " . $nombrefoto); 
                return redirect('/listacliente')->with('status','Registro actualizado correctamente.');
            }catch(Exception $e){
            Log::error($e);
            return redirect('/listacliente')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
        }else{
            try{
                Fichacliente::find($id)->update(['email'=>$request->get('email_edit_txt'),
                                            'direccion'=>$request->get('dire_edit_txt'),
                                            'telefono'=>$request->get('fono_edit_txt'), 
                                            'nacionalidad'=>$request->get('naci_cat'), 
                                            'region'=>$request->get('region_cat'), 
                                            'comuna'=>$request->get('comuna_cat'), 
                                            'giro'=>$request->get('giro_edit_txt'), 
                                            'cod_actividad'=>$request->get('codSucAct_edit_txt'), 
                                            'sucursal'=>$request->get('sucSii_edit_txt'), 
                                            'rut_rep_legal'=>$request->get('rutRep_edit_txt'), 
                                            'nombre_rep_legal'=>$request->get('nomRep_edit_txt'), 
                                            'nombre_sucursal'=>$request->get('nomSuc_edit_txt'), 
                                            'codigo_sucursal'=>$request->get('codSuc_edit_txt'), 
                                            'encargado_sucursal'=>$request->get('encargado_edit_txt'), 
                                            'region_sucursal'=>$request->get('regionsuc_cat'), 
                                            'comuna_sucursal'=>$request->get('comunasuc_cat'), 
                                            'direccion_sucursal'=>$request->get('direSuc_edit_txt'), 
                                            'nombre_contacto'=>$request->get('nomCont_edit_txt'), 
                                            'telefono_contacto'=>$request->get('fonoCont_edit_txt'), 
                                            'email_contacto'=>$request->get('emailCont_edit_txt'), 
                                            'cargo_contacto'=>$request->get('cargoCont_edit_txt')]);
                Log::info("actualizado sin foto"); 
                return redirect('/listacliente')->with('status','Registro actualizado correctamente.');
            }catch(QueryException $e){
                Log::error($e);
                return redirect('/listacliente')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
            }
        }
    }   
       
    /**
     *fichaclientes. Remove the specified resource from storage.
     *fichaclientes.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        Log::info("funcion eliminar : " . $id );
        
        try{
            $rut = Fichacliente::find($id);
        
            $rut->delete();
            //Log::info("eliminado ");
            return redirect('/listacliente')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/listacliente')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }

    public function cambiarStatusCliente(Request $request){

        Fichacliente::find($request->id)->update(['estadoficha' =>$request->estadoficha]);

        //$ficha=Fichacliente::find($request->ficha_id);
        Log::info("estado actualizado");
        return response()->json(['success'=>'Cambio con exito']);
    }
}
