<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatoSala;
use DB;

class GraficosController extends Controller
{
    public function lineas()
    {

<<<<<<< HEAD
    	// $sectores = DatoSala::all();

      $sectores = \DB::table('ss')
                    ->join('datos_sala', 'ss.id', '=' , 'datos_sala.sector_id')
                    ->select('datos_sala.total', 'ss.*')
                    ->get();

      // dd($sectores);
    	
      return view('graficos.comportamiento',['sectores'=>$sectores]);
=======
    	$sectores = DB::table('datos_sala')->select(['sector','total','hora_reporte'])->get();
    	$hora = DB::table('datos_sala')->select(['hora_reporte'])->groupBy('hora_reporte')->get();
    	//dd($hora);

    	foreach ($sectores as $s) {
    		$data[] = $s->total;
    		//$sector[] = $s->sector;

    		//$hora[] = $s->hora_reporte;
    	}

    	foreach ($hora as $h) {
    		$hor[] = $h->hora_reporte;
    	}
    	//dd($sectores);
    	return view('graficos.comportamiento',['sector'=>$sectores,'total'=>$data,'hora'=>$hor]);
>>>>>>> 9aa3b839e0c16e05e777babdf9ea45a507a3b3a9
    }

   public function sectores()
   {
   		return view('graficos.sectores');
   }
}
