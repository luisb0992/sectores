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
    	$total = DB::table('datos_sala')->select(['total','sector'])->groupBy('hora_reporte')->get();
    	$da = DB::table('datos_sala')->select(['total','sector'])->get();
    	//dd($total);

    	foreach ($da as $y) {
    		$datos[] = DB::table('datos_sala')->select('total')->where('sector',$y->sector)->first();
    	}

    	dd($datos);

    	foreach ($sectores as $s) {
    		$data[] = $s->total;
    		//$sector[] = $s->sector;

    		//$hora[] = $s->hora_reporte;
    	}

    	foreach ($hora as $h) {
    		$hor[] = $h->hora_reporte;
    	}

    	foreach ($total as $t) {
    		$hss[] = $t;
    	}
    	//dd($h);
    	return view('graficos.comportamiento',['sector'=>$sectores,'total'=>$datos,'hora'=>$hor,'data'=>$total]);
    }

   public function sectores()
   {
   		return view('graficos.sectores');
   }
}
