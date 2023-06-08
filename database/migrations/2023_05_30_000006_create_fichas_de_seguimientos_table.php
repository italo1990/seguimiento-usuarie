<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasDeSeguimientosTable extends Migration
{
    public function up()
    {
        Schema::create('fichas_de_seguimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('fecha_y_hora')->nullable();
            $table->longText('comentarios_seguimiento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
