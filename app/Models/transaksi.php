<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
  
    protected $table = 'TRANSAKSI';
    
   
    protected $primaryKey = 'id_transaksi';
    
  
    protected $fillable = [
        'id_pengguna',
        'id_pengemudi',
        'id_rute',
        'biaya',
        'tanggal_waktu',
        'created_at',
        'updated_at'
    ];
    
    
    protected $casts = [
        'biaya' => 'float',
        'tanggal_waktu' => 'datetime',
    ];
    
   
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
    
   
    public function pengemudi()
    {
        return $this->belongsTo(Pengemudi::class, 'id_pengemudi', 'id_pengemudi');
    }
    
   
    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute', 'id_rute');
    }
}