<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraficosController extends Controller
{
    public function lineas()
    {

    	$sectores = DB::table('metas_sectores')->select('sector')->get();
    	//dd($sectores);
    	return view('graficos.comportamiento',['sector'=>$sectores]);
    }

   public function sectores()
   {
   		return view('graficos.sectores');
   }
}
