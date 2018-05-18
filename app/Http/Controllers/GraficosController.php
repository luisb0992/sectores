<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraficosController extends Controller
{
    public function lineas()
    {

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
    }

   public function sectores()
   {
   		return view('graficos.sectores');
   }
}
