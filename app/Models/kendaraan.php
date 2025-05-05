<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pengemudi;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'plat_nomor';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'plat_nomor', 'jenis_kendaraan', 'tahun_kendaraan', 'id_pengemudi'
    ];

    public $timestamps = false; // Ganti ke true jika kamu pakai created_at & updated_at

    public function pengemudi()
    {
        return $this->belongsTo(Pengemudi::class, 'id_pengemudi', 'id_pengemudi');
    }
}
