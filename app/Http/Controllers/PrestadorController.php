<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use App\Models\Region;
use App\Models\Cargos;
use App\Models\Honorario;
use App\Models\Tipo_documento_honorario;
use App\Models\Forma_pago;

use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reg            = Region::all();
        $cargos         = Cargos::all();
        $tipo_documento = Tipo_documento_honorario::all();
        $forma          = Forma_pago::all();

        return view('Honorarios.prestador')->with('reg', $reg)->with('cargos', $cargos)->with('tipo_documento', $tipo_documento)->with('forma', $forma);
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

        $prestador_rut = $request->rut;

        $found = Prestador::where('rut_prestador', $prestador_rut)->count();

        if ($found == 0) {

            $insertar = new Prestador;

            $insertar->rut_prestador                = $request->rut;
            $insertar->nombre_prestador             = $request->nombre;
            $insertar->apellido_p_prestador         = $request->apellidoP;
            $insertar->apellido_m_prestador         = $request->apellidoM;
            $insertar->email_prestador              = $request->email;
            $insertar->telefono_prestador           = $request->telefono;
            $insertar->direccion_prestador          = $request->direccion;
            $insertar->cargos_id                    = $request->cargo;
            $insertar->comunas_id                   = $request->comuna_cat;
            $insertar->razon_social_prestador       = $request->razonSocial;
            $insertar->direccion_empresa_prestador  = $request->direccionE;
            $insertar->telefono_empresa_prestador   = $request->telefonoE;

            $insertar->timestamps = false;

            // Prestador::create($request->all()) ->save();
            // $insertar = $request->all()->save();
            $insertar->save();
            
        }
        return redirect('prestador');
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

    public function formatoRut(Request $request)
    {

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
            return $parte1 . "." . $parte2 . "." . $parte3 . "-" .  $parte4;
        }
    }

    public function rutFinder(Request $request)
    {
        $data = Prestador::select('*')->where('rut_prestador', $request->rut)->get();

        return response()->json($data);
    }
}
