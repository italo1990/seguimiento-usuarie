<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFichasDeSeguimientosTable extends Migration
{
    public function up()
    {
        Schema::table('fichas_de_seguimientos', function (Blueprint $table) {
            $table->unsignedBigInteger('usuarie_id')->nullable();
            $table->foreign('usuarie_id', 'usuarie_fk_8073179')->references('id')->on('usuaries');
            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id', 'profesional_fk_8073168')->references('id')->on('users');
        });
    }
}
