<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoSala extends Model
{
    protected $table = "datos_sala";

    protected $fillable = ["hora_reporte", "municipio", "parroquia", "sector_id", "total", "hora_ejecucion"];

    public function sector(){
    	return $this->belongsTo('App\SS', 'sector_id');
    }
}
