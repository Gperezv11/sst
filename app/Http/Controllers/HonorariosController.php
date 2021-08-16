<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Prestadores;
use Illuminate\Support\Facades\Log;

class HonorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Log::info("index Honorario");
        $reg=Region::all();
        return view ('Honorarios.honorarios', compact('reg'));
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
        if ($request->hasFile('imglogo')) {
            $nombrefoto = $request->file('imglogo')->getClientOriginalName();
            $request->imglogo->move(public_path('imagenes'),$nombrefoto);
        }else{
            $nombrefoto = "";

        }
        $estado ="1";
        
        $rut = $request->rut;
        Log::info("Store HonorariosController " .$rut);
        
        try{
            $rutvalida = Prestadores::where('rut', '=', $rut)->first();
            Log::info("HonorariosController el rut es" .$rutvalida);
            if ($rutvalida === null) {
                $fichaproveedor = Prestadores::create([
                    'rut'=> $rut,
                    'nombre'=> $request->nombre_prov_txt,
                    'email'=> $request->email_prov_txt,
                    'telefono'=> $request->telefono_prov_txt,
                    'nacionalidad'=> $request->naci_cat,
                    'region'=> $request->region_cat,
                    'comuna'=> $request->comuna_cat,
                    'direccion'=> $request->dir_prov_txt,
                    'nombre_contacto'=> $request->nombre_contacto_txt,
                    'telefono_contacto'=> $request->telefono_contacto_txt,
                    'email_contacto'=> $request->email_contacto_txt,
                    'cargo_contacto'=> $request->cargo_prov_txt,
                    'imagen'=> $nombrefoto,
                    'estado_ficha'=> $estado
                ]);

                return redirect('/prestadores')->with('status','Ficha creada con exito');
            } else {
                return redirect('/prestadores')->with('messageerror','Ese Rut ya existe en la base de datos');
            }   
        }catch(QueryException $e) {
            Log::alert($e);
            return redirect('/prestadores')->with('messageerror', 'Error al crear registro'); 
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

     //valida la existecia del rut proveedor ingresado
     public function validexistrutPrest(Request $request){
        
        Log::info('validexistrut HonorariosController' . $request->rut );
        try{
            function formatorut($rut_param) {
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
       
            $rutcliente = $request->rut;
            //Log::error('declarando variables : ' );
            $rutc = formatorut($rutcliente);
            Log::info('rut formateado ' . $rutc);

            $data=Prestadores::select('rut')->where('rut',$rutc)->get();
            Log::error($data);
            return response()->json($data);
       }catch (Exception $e) {
            Log::alert($e);
       }
        
    }
}
