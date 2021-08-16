<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Patente;
use App\Models\Reserva;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Reserva::all();
        return view('RestoBar.reserva')->with('tipos',$tipos);
    
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
        $mesa1 = $request->mesa1;
        if ($mesa1 == null){
            $mesa1 = 0;
        }else{
            $mesa1 = 1;
        }
        
        $mesa2 = $request->mesa2;
        if ($mesa2 == null){
            $mesa2 = 0;
        }else{
            $mesa2 = 1;
        }
        
        $mesa3 = $request->mesa3;
        if ($mesa3 == null){
            $mesa3 = 0;
        }else{
            $mesa3 = 1;
        }
        $mesa4 = $request->mesa4;
        if ($mesa4 == null){
            $mesa4 = 0;
        }else{
            $mesa4 = 1;
        }
        $mesa5 = $request->mesa5;
        if ($mesa5 == null){
            $mesa5 = 0;
        }else{
            $mesa5 = 1;
        }
        $mesa6 = $request->mesa6;
        if ($mesa6 == null){
            $mesa6 = 0;
        }else{
            $mesa6 = 1;
        }
        $mesa7 = $request->mesa7;
        if ($mesa7 == null){
            $mesa7 = 0;
        }else{
            $mesa7 = 1;
        }
        $mesa8 = $request->mesa8;
        if ($mesa8 == null){
            $mesa8 = 0;
        }else{
            $mesa8 = 1;
        }
        

        try{
            $tipo = Reserva::create([
                'nombre' => $request->nombre1,
                'sucursal' => $request->sucursal1,
                'dia' => $request->dia,
                'hora' => $request->hora1,
                'adultos' => $request->adultos,
                'ni«Ğos' => $request->ni«Ğos,
                'cantidad' => $request->totalPersonas,
                'email' => $request->email,
                'celular' => $request->celular,
                'mesa' => $request->mesaReserva,
                'comentario' => $request->comentario
            ]);
    
            return redirect('/reserva')->with('status','Registro actualizado correctamente.');    
        }catch(Exception $e){
            Log::error($e);
            return redirect('/reserva')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
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
        Log::info("funcion update reserva :". $id );
        try{
            Reserva::find($id)->update(['nombre'=>$request->get('nombre1_edit'),
                                        'sucursal'=>$request->get('sucursal1_edit'),
                                        'dia'=>$request->get('dia_edit'),
                                        'hora'=>$request->get('hora1_edit'),
                                        'adultos'=>$request->get('adultos_edit'),
                                        'ni«Ğos'=>$request->get('ni«Ğos_edit'),
                                        'cantidad'=>$request->get('total_edit'),
                                        'email'=>$request->get('email_edit'),
                                        'celular'=>$request->get('celular_edit'),
                                        'mesa'=>$request->get('mesaReserva_edit'),
                                        'comentario'=>$request->get('comentario_edit')
                                        ]);
            return redirect('/reserva')->with('status','Registro actualizado correctamente.');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/reserva')->with('messageerror','El registro no se pudo actualizar. Intente nuevamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info("funcion eliminar reserva : " . $id );
        
        try{
            $cat = Reserva::find($id);
            $cat->delete();
            Log::info("eliminado :" . $cat);

            return redirect('/reserva')->with('status','registro eliminado');
        }catch(QueryException $e){
            Log::error($e);
            return redirect('/reserva')->with('messageerror','El registro no se pudo eliminar. Intente nuevamente');
        }
    }
     
     
    
}