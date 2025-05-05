<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    // Nama tabel sesuai dengan database Oracle
    protected $table = 'TRANSAKSI';
    
    // Primary key
    protected $primaryKey = 'id_transaksi';
    
    // Field yang boleh diisi (fillable)
    protected $fillable = [
        'id_pengguna',
        'id_pengemudi',
        'id_rute',
        'biaya',
        'tanggal_waktu',
        'created_at',
        'updated_at'
    ];
    
    // Cast tipe data
    protected $casts = [
        'biaya' => 'float',
        'tanggal_waktu' => 'datetime',
    ];
    
    // Relasi dengan model Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
    
    // Relasi dengan model Pengemudi
    public function pengemudi()
    {
        return $this->belongsTo(Pengemudi::class, 'id_pengemudi', 'id_pengemudi');
    }
    
    // Relasi dengan model Rute
    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute', 'id_rute');
    }
}