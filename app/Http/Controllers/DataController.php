<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatoSala;
use App\Centro;
use App\Sector;
use App\SS;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sector1 = DatoSala::where('sector_id', \Auth::user()->sector_id)->first();

        $sector = \DB::table('ss')
                    ->join('users', 'ss.id', '=' , 'users.sector_id')
                    ->select('ss.*')
                    ->where('users.sector_id', \Auth::user()->sector_id)
                    ->first();

        return view('data.create',[
            'centro' => Centro::groupBy('municipio')->get(),
            'sector' => $sector
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = new DatoSala;
        $data->fill($request->all());
        $data->hora_ejecucion = date('H:m a');

        if($data->save()){
            return redirect("datasala")->with([
            'flash_message' => 'Reporte agregado correctamente.',
            'flash_class' => 'alert-success'
            ]);
        }else{
            return redirect("datasala")->with([
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'flash_important' => true
          ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function parroquias($municipio){
        $parro = Centro::where('municipio', $municipio)->groupBy('parroquia')->get();
        return response()->json($parro);
    }
}
