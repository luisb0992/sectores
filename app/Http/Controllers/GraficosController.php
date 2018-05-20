<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatoSala;
use App\SS;
USE App\Sector;
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

    public function sectoresGrafico()
    {
    		//$sectores = Sector::all();

    		$sectores = DB::table('datos_sala')
    		->select(['datos_sala.*','metas_sectores.*'])
    					->selectRaw('SUM(datos_sala.total) as cantidad')
    					->leftjoin('metas_sectores','metas_sectores.Id','=','datos_sala.sector_id')
    					->groupBy('datos_sala.sector_id')
    					->get();

    		//dd($sectores);


    		return response()->json(['data'=>$sectores]);

    }


   public function sectores()
   {
   		$sectores = DB::table('datos_sala')
    		->select(['datos_sala.*','metas_sectores.*'])
    					->selectRaw('SUM(datos_sala.total) as cantidad')
    					->leftjoin('metas_sectores','metas_sectores.Id','=','datos_sala.sector_id')
    					->groupBy('datos_sala.sector_id')
    					->get();

    				//dd($sectores);

   		return view('graficos.sectores',['sectores'=>$sectores]);
   }
}
