<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengemudi extends Model
{
    use HasFactory;

    protected $table = 'pengemudi';
    protected $primaryKey = 'id_pengemudi';
    public $timestamps = true;

    public $incrementing = false; 

    protected $fillable = [
        'id_pengemudi', 
        'nama',
        'no_sim',
    ];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'id_pengemudi');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pengemudi');
    }
}
