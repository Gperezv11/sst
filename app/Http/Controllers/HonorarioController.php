<?php

namespace App\Http\Controllers;

use App\Models\Honorario;
use Illuminate\Http\Request;
use App\Models\Prestador;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HonorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $documento = $request->file('fini_file')->getClientOriginalName();


        // echo "<PRE>";
        // print_r($documento);
        // die();

        $rut = $request->rutpc;
        $id = DB::table('prestadors')->select('id')->where('rut_prestador', '=',$rut)->first();

        $datefechae = new Carbon($request->fechaE);
        $datefechav = new Carbon($request->vencimiento);
        $endDate = $datefechae->diffInDays($datefechav);

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mes = $meses[($datefechae->format('n')) - 1];
        $prestador2 = new Prestador;
        $insertar = new Honorario;

        $insertar->n_documento_honorario            = $request->numeroDocumento;
        $insertar->fecha_emicion_honorario          = $request->fechaE;
        $insertar->fecha_vencimiento_honorario      = $request->vencimiento;
        $insertar->plazo                            = $endDate;
        $insertar->periodo                          = $mes;
        $insertar->forma_pago_id                    = $request->tipoPago;
        $insertar->tipo_documento_honorario_Id      = $request->tipoDoc;
        $insertar->comentario                       = $request->comentario;
        $insertar->prestadors_id                    = $id->id;
        $insertar->url_honorario                    = $request->file('fini_file')->getClientOriginalName();

        $request->fini_file->move(public_path('doc'), $documento);


        $insertar->timestamps = false;

        // Prestador::create($request->all()) ->save();
        // $insertar = $request->all()->save();
        $insertar->save();
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
}
