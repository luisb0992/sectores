<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatoSala;
use DB;

class GraficosController extends Controller
{
    public function lineas()
    {

      $sectores = \DB::table('ss')
                    ->join('datos_sala', 'ss.id', '=' , 'datos_sala.sector_id')
                    ->select('datos_sala.total', 'ss.*')
                    ->get();

      // dd($sectores);
    	
      return view('graficos.comportamiento',['sectores'=>$sectores]);
    }
   public function sectores()
   {
   		return view('graficos.sectores');
   }
}
