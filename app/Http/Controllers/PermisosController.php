<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use App\Models\Permiso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $permisos = Licencia::all();
        return view('Personal.permisos')->with('permisos',$permisos);
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
        $fecha_inicio = $request->get('fInicio');
        $fecha_termino = $request->fTermino;
        $fecha_inicio_out = Carbon::createFromFormat('d/m/Y',$fecha_inicio)->format('Y-m-d');
        $fecha_termino_out = Carbon::createFromFormat('d/m/Y',$fecha_termino)->format('Y-m-d');

        $permisos = new Permiso();
        $permisos -> rut = $request->get('rut');
        $permisos -> nombre = $request->get('nombreInput');
        $permisos -> tipopermiso = $request->get('permBox');
        $permisos -> finicio = $fecha_inicio_out;
        $permisos -> ftermino = $fecha_termino_out;
        $permisos -> save();
        return redirect('/permisos');
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
