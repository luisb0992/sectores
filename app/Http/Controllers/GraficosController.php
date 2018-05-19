<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatoSala;
use App\SS;
use DB;

class GraficosController extends Controller
{
    public function lineas()
    {
/*
      $sectores = \DB::table('ss')
                    ->leftjoin('datos_sala', 'ss.id', '=' , 'datos_sala.sector_id')
                    ->selectRaw('ss.*, SUM(datos_sala.total) AS total, HOUR(')
                    ->where('ss.id','!=','NULL')
                    ->groupBy('ss.id')
                    ->sum('datos_sala.total')
                    ->get();
                    */

        $sectores = SS::where('id','!=','NULL')->where('Id','!=',25)->get();
    	
      return view('graficos.comportamiento2',['sectores'=>$sectores]);
    }

    public function sectoresGrafico(){
    }


   public function sectores()
   {
   		return view('graficos.sectores');
   }
}
