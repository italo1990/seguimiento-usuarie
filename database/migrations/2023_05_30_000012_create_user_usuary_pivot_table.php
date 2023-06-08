<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUsuaryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('user_usuary', function (Blueprint $table) {
            $table->unsignedBigInteger('usuary_id');
            $table->foreign('usuary_id', 'usuary_id_fk_8055489')->references('id')->on('usuaries')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8055489')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
