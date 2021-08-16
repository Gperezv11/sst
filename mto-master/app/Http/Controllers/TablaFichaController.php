<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;

use App\Models\Fichapersonal;
use App\Models\Region;
use Carbon\Carbon;

class TablaFichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reg = Region::all();
        $com = Comuna::all();
        $fichas = Fichapersonal::all();

        return view('tablaficha')->with('fichas', $fichas)->with('reg', $reg)->with('com',$com);
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
        $fichas = Fichapersonal::find($id);


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
        $ficha = Fichapersonal::find($id);


        $fecha_ingreso = $request->fing_date;
        $fecha_termino = $request->fter_date;
        $fecha_ingreso_out = Carbon::createFromFormat('d/m/Y',$fecha_ingreso)->format('Y-m-d');
        $fecha_termino_out = Carbon::createFromFormat('d/m/Y',$fecha_termino)->format('Y-m-d');


        $ficha->nacionalidad = $request->get('naci_cat');
        $ficha->region = $request->get('region_cat');
        $ficha->comuna = $request->get('comuna_cat');
        $ficha->direccion = $request->get('dire_edit_txt');
        $ficha->fono = $request->get('fono_edit_txt');
        $ficha->mail = $request->get('mail_edit_txt');
        $ficha->empresa = $request->get('empe_txt');
        $ficha->cargo = $request->get('cargo_txt');
        $ficha->supervisor = $request->get('supe_txt');
        $ficha->proyecto = $request->get('proye_txt');
        $ficha->sueldo_base = $request->get('sueldo_edit_txt');
        $ficha->bono = $request->get('bono_edit_txt');
        $ficha->asignacion = $request->get('asignacion_edit_txt');
        $ficha->afp = $request->get('afp_txt');
        $ficha->salud = $request->get('salud_txt');
        $ficha->plan_salud = $request->get('psalud_edit_txt');
        $ficha->fecha_ingreso = $fecha_ingreso_out;
        $ficha->fecha_termino = $fecha_termino_out;
        $ficha->tipo_contrato = $request->get('tcon_txt');

        //$ficha->imple = $request->get('entim_file_re');
        //$ficha->contrato = $request->get('cont_file_re');
        //$ficha->anexo = $request->get('anex_file_re');
        //$ficha->finiquito=$request->get('fini_filke_re');

        $ficha->save();

        return redirect('/tablaficha');
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
