<?php

namespace App\Http\Controllers;

use App\Models\plancuentas;
use App\Models\tipo_cuentas;
use App\Models\tipo_servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class plancuentasController extends Controller
{
    public function index()
    {
        $tservicios = DB::table('tipo_servicios')
        ->join('tipo_cuentas','tipo_cuentas.id','=','tipo_servicios.tipo_cuenta_id')
        ->select('tipo_servicios.id as id','tipo_servicios.nombre_servicio as nombre','tipo_cuentas.nombre_tipo_cuenta as cuenta')
        ->get();
        $tcuenta = tipo_cuentas::all();
        return view('contabilidad.plancuentas')->with('tservicios', $tservicios)->with('tcuenta', $tcuenta);
    }
    public function store(Request $request)
    {
        $c = new tipo_servicios();
        $c->nombre_servicio     =   $request->servicio;
        $c->tipo_cuenta_id      =   $request->cuenta;
        $c->timestamps = false;
        $c->save();
        return redirect('plancuentas');
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
        $c = tipo_servicios::find($id);

        $c->nombre_servicio     =   $request->servicio_edit;
        $c->tipo_cuenta_id      =   $request->cuenta_edit;
        $c->timestamps = false;
        $c->save();

        return redirect('tipo_servicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med = tipo_servicios::find($id);
        $med->delete();

        return redirect('tipo_servicio');
    }
}
