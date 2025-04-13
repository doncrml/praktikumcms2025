<?php

namespace App\Models;

class Transaksi
{
    public static function all()
    {
        return [
            ['id' => 1, 'id_pengguna' => 1, 'id_pengemudi' => 1, 'id_kendaraan' => 'B1234XYZ', 'id_rute' => 1, 'total_biaya' => 25000],
            ['id' => 2, 'id_pengguna' => 2, 'id_pengemudi' => 2, 'id_kendaraan' => 'D5678ABC', 'id_rute' => 2, 'total_biaya' => 35000],
        ];
    }

    public static function find($id)
    {
        return collect(self::all())->firstWhere('id', $id);
    }
}
