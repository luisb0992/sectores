<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatoSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_sala', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora_reporte')->nullable();
            $table->string('hora_ejecucion')->nullable();
            $table->string('sector')->nullable();
            $table->string('municipio')->nullable();
            $table->string('parroquia')->nullable();
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_sala');
    }
}
