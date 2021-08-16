<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comuna;
use Illuminate\Support\Facades\Log;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function findComuna(Request $request){
        $data=Comuna::select('nombre','id')->where('region_id',$request->id)->take(100)->get();

        return response()->json($data);
    }
}
