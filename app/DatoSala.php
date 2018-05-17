<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoSala extends Model
{
    protected $table = "datos_sala";

    protected $fillable = ["hora_reporte", "municipio", "parroquia", "sector", "total", "hora_ejecucion"];
}
