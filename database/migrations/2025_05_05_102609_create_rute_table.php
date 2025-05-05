<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuteTable extends Migration
{
    public function up()
    {
        Schema::create('rute', function (Blueprint $table) {
            $table->id('id_rute'); 
            $table->string('rute_awal');
            $table->string('rute_tujuan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rute');
    }
}
