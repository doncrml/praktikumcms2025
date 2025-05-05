<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_pengemudi');
            $table->unsignedBigInteger('id_rute');
            $table->decimal('biaya', 10, 2);
            $table->dateTime('tanggal_waktu');
            $table->timestamps(); 
            
            // Sesuaikan foreign key dengan nama kolom sebenarnya
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            $table->foreign('id_pengemudi')->references('id_pengemudi')->on('pengemudi')->onDelete('cascade');
            $table->foreign('id_rute')->references('id_rute')->on('rute')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
