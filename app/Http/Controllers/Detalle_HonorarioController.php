<?php

namespace App\Http\Controllers;

use App\Models\Detalle_honorario;
use Illuminate\Http\Request;

class Detalle_HonorarioController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertar = new Detalle_honorario();

        $insertar->tipo_servicio                = $request->servicio;
        $insertar->nombre_prestador             = $request->comentarioH;
        $insertar->bruto         = $request->bruto;
        $insertar->apellido_m_prestador         = $request->apellidoM;
        $insertar->email_prestador              = $request->email;

        $insertar->timestamps = false;

        // Prestador::create($request->all()) ->save();
        // $insertar = $request->all()->save();
        $insertar->save();
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
