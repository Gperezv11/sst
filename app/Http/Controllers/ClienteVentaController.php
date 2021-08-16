<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Region;
use App\Models\Comuna;
use App\Models\Fichacliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Exception;


class ClienteVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reg=Region::all();
        return view ('Ventas.clientev', compact('reg'));
    }

    public function findComunaC(Request $request){
        $data=Comuna::select('nombre','id')->where('region_id',$request->id)->take(100)->get();

        return response()->json($data);
    }

    public function validexistrut(Request $request){

        function formatorut($rut_param)
    {
        $parte1 = substr($rut_param, 0, 2); //12
        //Log::error($parte1);
        $parte2 = substr($rut_param, 2, 3); //345
        //Log::error($parte2);
        $parte3 = substr($rut_param, 5, 3); //456
        //Log::error($parte3);
        $parte4 = substr($rut_param, 8);   //todo despues del caracter 8
        //Log::error($parte4);
        return $parte1 . "." . $parte2 . "." . $parte3 ."-".  $parte4;

    }
       try{
            $rutcliente = $request->rut;
            //Log::error('declarando variables : ' );
            $rutc = formatorut($rutcliente);
            Log::info('rut formateado ' . $rutc);

            $data=Fichacliente::select('rut')->where('rut',$rutc)->get();
            Log::error($data);
            return response()->json($data);
       }catch (Exception $e) {
            Log::alert($e);
       }
        
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
        $nombrefoto = $request->file('imglogo')->getClientOriginalName();
        $request->imglogo->move(public_path('imagenes'),$nombrefoto);

        $rutcliente = $request->rut;
        $rutrep = $request-> rut_rep_txt;

       
        function formateo_rut($rut_param)
        {
            $parte1 = substr($rut_param, 0, 2); //12
            $parte2 = substr($rut_param, 2, 3); //345
            $parte3 = substr($rut_param, 5, 3); //456
            $parte4 = substr($rut_param, 8);   //todo despues del caracter 8

            return $parte1 . "." . $parte2 . "." . $parte3 ."-".  $parte4;

        }

        $rutc = formateo_rut($rutcliente);
        $rutrepf = formateo_rut($rutrep);


        if($nombrefoto == null){
            $nombrefoto = 'test.jpg';
            Log::alert('archivo nulo :');
        }

        $giro = $request->giro_cliente;
        if($giro === null){
            Log::alert('giro no es null :' );
            $giro= "";
        }

        $rut = Fichacliente::where('rut', '=', $rutc)->first();
        
        try{

        
            if ($rut === null) {
                $fichacliente = Fichacliente::create([

                    'email'=> $request->email_cliente_txt,
                    'direccion'=> $request->dir_cliente_txt,
                    'rut'=> $rutcliente,
                    'nombre_cliente'=> $request->nombre_cliente_txt,
                    'telefono'=> $request->telefono_cliente_txt,
                    'nacionalidad'=> $request->naci_cat,
                    'region'=> $request->region_cat,
                    'comuna'=> $request->comuna_cat,
                    'giro' => $giro,                
                    'cod_actividad'=> $request->codigo_act_cliente,
                    'sucursal'=> $request->sucursal_cliente,
                    'rut_rep_legal'=> $rutrep,
                    'nombre_rep_legal'=> $request->nombre_rep_txt,
                    'nombre_sucursal'=> $request->nombre_suc_txt,
                    'codigo_sucursal'=> $request->codigo_suc_txt,
                    'encargado_sucursal'=> $request->encargado_suc_txt,
                    'region_sucursal'=> $request->region_cat_suc,
                    'comuna_sucursal'=> $request->comuna_cat_suc,
                    'direccion_sucursal'=> $request->direcc_suc_txt,
                    'nombre_contacto'=> $request->nombre_contacto_txt,
                    'telefono_contacto'=> $request->telefono_contacto_txt,
                    'email_contacto'=> $request->email_contacto_txt,
                    'cargo_contacto' => $request->cargo_contacto_txt,
                    'imagen' =>$nombrefoto,
                    'estadoficha'=>"1"

                ]);

                return redirect('/clientev')->with('message','Ficha creada con exito');
            } else {
                return redirect('/clientev')->with('messageerror','Ese Rut ya existe en la base de datos');
            }   
        }catch(QueryException $e) {
            Log::alert($e);
            return redirect('/clientev')->with('status', 'Error al crear registro'); 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
