<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->string('Plat_Nomor')->primary(); 
            $table->string('Jenis_Kendaraan');
            $table->integer('Tahun_Kendaraan');
            $table->unsignedBigInteger('ID_Pengemudi');

            // foreign key ke tabel pengemudi
            $table->foreign('ID_Pengemudi')
                  ->references('id_pengemudi')
                  ->on('pengemudi')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
}
