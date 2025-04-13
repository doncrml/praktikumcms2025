<?php

namespace App\Models;

class Kendaraan
{
    public static function all()
    {
        return [
            ['plat_nomor' => 'B1234XYZ', 'jenis_kendaraan' => 'Motor', 'tahun_kendaraan' => 2020, 'id_pengemudi' => 1],
            ['plat_nomor' => 'D5678ABC', 'jenis_kendaraan' => 'Mobil', 'tahun_kendaraan' => 2019, 'id_pengemudi' => 2],
        ];
    }

    public static function find($plat)
    {
        return collect(self::all())->firstWhere('plat_nomor', $plat);
    }
}
