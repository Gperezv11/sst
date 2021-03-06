<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetMedico;

class VetMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medico = VetMedico::all();
        return view('ma.vetdoctor')->with('medico', $medico);
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
        $vet = new VetMedico;

        $vet->rut = $request->rut;
        $vet->nombre = $request->nom_inp;
        $vet->apellido_p = $request->pat_inp;
        $vet->apellido_m = $request->mat_inp;
        $vet->especialidad = $request->esp_inp;
        $vet->codigo = $request->cod_inp;

        $vet->save();

        return redirect('vetmedico');
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
        $m = VetMedico::find($id);

        $m->rut             =   $request->rut;
        $m->nombre          =   $request->nom_edit;
        $m->apellido_p      =   $request->pat_edit;
        $m->apellido_m      =   $request->mat_edit;
        $m->especialidad    =   $request->esp_edit;
        $m->codigo          =   $request->cod_edit;

        $m->save();

        return redirect('vetmedico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med = VetMedico::find($id);
        $med->delete();

        return redirect('vetmedico');
    }
}
