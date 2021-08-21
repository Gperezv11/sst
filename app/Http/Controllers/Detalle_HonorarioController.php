<?php

namespace App\Http\Controllers;

use App\Models\Detalle_honorario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $insertar = new Detalle_honorario();
        $nhonorario = $request->idh;
        $id = DB::table('honorarios')->select('id')->where('n_documento_honorario', '=',$nhonorario)->first();
        DB::table('detalle_honorarios')->insert([
            'tipo_servicio' => $request->servicio,
            'cometario' => $request->comentarioH,
            'bruto' => $request->bruto,
            'retencion' => $request->retencion,
            'liquido' => $request->liquido,
            'honorarios_id' => $id->id,
           ]);

        $insertar->timestamps = false;

       // $insertar->save();
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
