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

      $total = \DB::table('datos_sala')
                    
                    ->selectRaw('SUM(total) AS total, municipio')
                    //->select()
                    //->where('ss.id','!=','NULL')
                    //->groupBy('ss.id')
                    //->sum('datos_sala.total')
                    ->groupBy('municipio')
                    ->get();
                    


                   // dd($total);


        $sectores = SS::where('id','!=','NULL')->where('Id','!=',25)->get();
    	
      return view('graficos.comportamiento2',['sectores'=>$sectores, 'total' => $total]);
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
    					->where('metas_sectores.Id','!=',26)
    					->get();


		$total = DB::table('datos_sala')
    					//->select(['datos_sala.*','metas_sectores.*'])
    					->selectRaw('SUM(datos_sala.total) as total_cargados,SUM(META_ELECTORAL) as total')
    					->join('metas_sectores','metas_sectores.Id','=','datos_sala.sector_id')
    					//->groupBy('datos_sala.sector_id')
    					->first();

    					//dd($total);
    				//dd($sectores);

   		return view('graficos.sectores',['sectores'=>$sectores,'total'=>$total]);
   }
}
