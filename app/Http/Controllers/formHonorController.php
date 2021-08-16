<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Region;
use App\Models\Comuna;
use App\Models\Fichapersonal;
use App\Models\Prestadores;
use Carbon\Carbon;

class formHonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reg=Region::all();
        return view('Honorarios.formHonor',compact('reg'));
    }
    public function findComuna(Request $request){
        $data=Comuna::select('nombre','id')->where('region_id',$request->id)->take(100)->get();

        return response()->json($data);
    }
    public function guardar(){

    }
    public function cargar(Request $request)
    {
        $formulario = Prestadores::select('nombre, email, telefono, region, comuna, direccion')->where('rut', $request->rutClientHonor)->get();

            return response()->json($formulario);
       
    }
    public function store(Request $request){

        $fecha = $request->fecha;
        $perdiodo = $request->periodo;
        $plazo = $request->plazo;
        $vencimiento = $request->vencimiento;

        $fecha=Carbon::createFromFormat('d/m/Y',$fecha)->format('Y-m-d');
        $periodo=Carbon::createFromFormat('m/Y',$fecha_ingreso)->format('Y-m');
        $plazo=Carbon::createFromFormat('d/m/Y',$plazo)->format('Y-m-d');
        $vencimiento=Carbon::createFromFormat('d/m/Y',$vencimiento)->format('Y-m-d');

        $numeroDoc = $request->numeroDoc;
        $tipoDoc = $request->tipoDoc;
        $nota = $request->nota;
        $tipoPago = $request->tipoPago;
        $documento= $documento->documento;
        

        function formateo_rut($rut_param)
        {
            $parte1 = substr($rut_param, 0, 2); //12
            $parte2 = substr($rut_param, 2, 3); //345
            $parte3 = substr($rut_param, 5, 3); //456
            $parte4 = substr($rut_param, 8);   //todo despues del caracter 8

            return $parte1 . "." . $parte2 . "." . $parte3 . $parte4;

        }

        $rutch = formateo_rut($rutvh);
        

    }
}

