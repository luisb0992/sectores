<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatoSala;
use App\SS;
USE App\Sector;
USE App\Municipio;
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

    public function sectoresGrafico()
    {
            $sectores = DB::table('datos_sala')
            ->select(['datos_sala.*','metas_sectores.*'])
                        ->selectRaw('SUM(datos_sala.total) as cantidad')
                        ->leftjoin('metas_sectores','metas_sectores.Id','=','datos_sala.sector_id')
                        ->groupBy('datos_sala.sector_id')
                        ->get();

            return response()->json(['data'=>$sectores]);

    }


   public function graficoMuni()
    {

        $municipios = DB::table('datos_sala')
                    ->select(['datos_sala.municipio as municipio','metas_sectores.SECTORES_SOCIALES AS sector','municipios.meta as meta'])
                    ->selectRaw('SUM(datos_sala.total) as cantidad')
                    ->leftjoin('municipios','municipios.municipio','=','datos_sala.municipio')
                    ->leftjoin('metas_sectores','metas_sectores.id','=','datos_sala.sector_id')
                    ->where('datos_sala.status', 1)
                    ->groupBy('datos_sala.municipio')
                    ->get();

        // dd($municipios);

        return view('graficos.municipio',[
            'municipios' => $municipios
        ]);

    }

    public function reloadMuni()
    {
            $municipios = DB::table('datos_sala')
                    ->select(['datos_sala.municipio as municipio','metas_sectores.SECTORES_SOCIALES AS sector','municipios.meta as meta'])
                    ->selectRaw('SUM(datos_sala.total) as cantidad')
                    ->leftjoin('municipios','municipios.municipio','=','datos_sala.municipio')
                    ->leftjoin('metas_sectores','metas_sectores.id','=','datos_sala.sector_id')
                    ->where('datos_sala.status', 1)
                    ->groupBy('datos_sala.municipio')
                    ->get();
                        
            return response()->json(['data'=>$municipios]);

    }
}
