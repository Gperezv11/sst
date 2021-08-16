<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Region;
use App\Models\Comuna;
use App\Models\Fichapersonal;
use Carbon\Carbon;

class FichaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reg=Region::all();
        return view('ficha', compact('reg'));
    }

    public function findComuna(Request $request){
        $data=Comuna::select('nombre','id')->where('region_id',$request->id)->take(100)->get();

        return response()->json($data);
    }

    public function store(Request $request){

        $nombrefoto = $request->file('imgInp')->getClientOriginalName();
        $request->imgInp->move(public_path('imagenes'),$nombrefoto);

        $nombreanexo = $request->file('anex_file')->getClientOriginalName();
        $request->anex_file->move(public_path('archivos'),$nombreanexo);

        $nombrefiniquito = $request->file('fini_file')->getClientOriginalName();
        $request->fini_file->move(public_path('archivos'),$nombrefiniquito);

        $nombreregla = $request->file('regint_file')->getClientOriginalName();
        $request->regint_file->move(public_path('archivos'),$nombreregla);

        $nombreimple = $request->file('entim_file')->getClientOriginalName();
        $request->entim_file->move(public_path('archivos'),$nombreimple);

        $nombrecontrato = $request->file('cont_file')->getClientOriginalName();
        $request->cont_file->move(public_path('archivos'),$nombrecontrato);

        $fecha_ingreso = $request->fing_date;
        $fecha_termino = $request->fter_date;

        $fecha_ingreso_out = Carbon::createFromFormat('d/m/Y',$fecha_ingreso)->format('Y-m-d');
        $fecha_termino_out = Carbon::createFromFormat('d/m/Y',$fecha_termino)->format('Y-m-d');

        $rutsf = $request->rut;

        function formateo_rut($rut_param)
        {
            $parte1 = substr($rut_param, 0, 2); //12
            $parte2 = substr($rut_param, 2, 3); //345
            $parte3 = substr($rut_param, 5, 3); //456
            $parte4 = substr($rut_param, 8);   //todo despues del caracter 8

            return $parte1 . "." . $parte2 . "." . $parte3 .  $parte4;

        }

        $rutcf = formateo_rut($rutsf);

        $rut = Fichapersonal::where('rut', '=', $rutcf)->first();
        if ($rut === null) {
            $fichapersonals = Fichapersonal::create([
                'rut'=> $rutcf,
                'nombre'=> $request->nombre_txt,
                'apellido_mat'=> $request->amat_txt,
                'apellido_pat'=> $request->apat_txt,
                'direccion'=> $request->dire_txt,
                'fono'=> $request->fono_txt,
                'mail'=> $request->mail_txt,
                'region'=> $request->region_cat,
                'comuna'=> $request->comuna_cat,
                'nacionalidad'=> $request->naci_cat,
                'empresa'=> $request->empe_txt,
                'cargo'=> $request->cargo_txt,
                'supervisor'=> $request->supe_txt,
                'proyecto'=> $request->proye_txt,
                'sueldo_base'=> $request->sbase_txt,
                'bono'=> $request->bono_txt,
                'asignacion'=> $request->asig_txt,
                'afp'=> $request->afp_txt,
                'salud'=> $request->salud_txt,
                'plan_salud'=> $request->psalud_txt,
                'fecha_ingreso'=> $fecha_ingreso_out,
                'fecha_termino'=> $fecha_termino_out,
                'tipo_contrato'=> $request->tcon_txt,
                'imagen'=> $nombrefoto,
                'anexo'=>$nombreanexo,
                'contrato'=>$nombrecontrato,
                'finiquito'=>$nombrefiniquito,
                'regla'=>$nombreregla,
                'imple'=>$nombreimple,
                'estadoficha'=>"Activo",
            ]);

            return redirect('/ficha')->with('message','Ficha creada con exito');
        } else {
            return redirect('ficha')->with('messageerror','Ese Rut ya existe en la base de datos');
        }

    }

}
