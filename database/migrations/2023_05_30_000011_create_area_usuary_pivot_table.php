<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaUsuaryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('area_usuary', function (Blueprint $table) {
            $table->unsignedBigInteger('usuary_id');
            $table->foreign('usuary_id', 'usuary_id_fk_8554252')->references('id')->on('usuaries')->onDelete('cascade');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id', 'area_id_fk_8554252')->references('id')->on('areas')->onDelete('cascade');
        });
    }
}
