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
        return view('data.index',[
            'data' => DatoSala::where('status', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sector = \DB::table('ss')
                    ->join('users', 'ss.Id', '=' , 'users.sector_id')
                    ->select('ss.*')
                    ->where('users.sector_id', \Auth::user()->sector_id)
                    ->first();
        // dd($data);

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
        // $data = DatoSala::where('sector_id', \Auth::user()->sector_id)->first();

        $hora_reporte = DatoSala::where('sector_id', \Auth::user()->sector_id)
                        ->where('hora_reporte', $request->hora_reporte)
                        ->where('municipio', $request->municipio)
                        ->where('parroquia', $request->parroquia)->first();
        
        if ($hora_reporte) {
            
            return redirect("datasala")->with([
                'flash_message' => 'Ya existe una carga registrada en dicha hora!',
                'flash_class' => 'alert-danger',
                'flash_important' => true
          ]);

        }else{

            $data = new DatoSala;
            $data->fill($request->all());
            $data->hora_ejecucion = date('H:m a');
            $data->status = 0;

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

    public function status(){

        $data = DatoSala::where('status', 0)->get();

        return view('data.status',[
            'data' => $data
        ]);
    }

    public function cambioStatus(Request $request){

        $data = DatoSala::findOrFail($request->valor);
        $data->status = 1;
        $data->save();

        return response()->json($data);
    }

    public function allData(){

        $data = DatoSala::where('status', 0)->update(['status' => 1]);

        return response()->json($data);
    }


}
