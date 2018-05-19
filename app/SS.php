<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SS extends Model
{
    protected $table = "ss";

    protected $primaryKey = "Id";

    protected $fillable = ['sector'];

    public function datos(){
    	$datos =  \DB::table('ss')
			    	->join('datos_sala', 'datos_sala.sector_id', '=', 'ss.Id')
			        ->selectRaw('SUM(datos_sala.total) AS total, HOUR(hora_reporte) AS hora')
			        ->where('ss.id',$this->Id)
			        ->where('datos_sala.status','=',1)
			        ->groupBy('hora')
			        ->get()
			        ->toArray();
		
		$data = array_pad([],16,'null');

		foreach ($datos as $d) {
			$index = $this->setData($d->hora);
			$data[$index] = $d->total;
		}

		return $data;
    }

    protected function setData($hora){
    	switch ($hora) {
    		case 7: return 0; break;
    		case 8: return 1; break;
    		case 9: return 2; break;
    		case 10: return 3; break;
    		case 11: return 4; break;
    		case 12: return 5; break;
    		case 13: return 6; break;
    		case 14: return 7; break;
    		case 15: return 8; break;
    		case 16: return 9; break;
    		case 17: return 10; break;
    		case 18: return 11; break;
    		case 19: return 12; break;
    		case 20: return 13; break;
    		case 21: return 14; break;
    		case 22: return 15; break;
    	}
    }
}
