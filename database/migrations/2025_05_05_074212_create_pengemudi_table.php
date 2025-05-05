<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengemudiTable extends Migration
{
    public function up(): void
    {
        Schema::create('pengemudi', function (Blueprint $table) {
            $table->id('id_pengemudi'); // primary key auto-increment
            $table->string('nama', 100);
            $table->string('no_sim', 20);
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengemudi');
    }
}
