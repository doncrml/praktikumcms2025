<?php

namespace App\Models;

class Rute
{
    public static function all()
    {
        return [
            ['id' => 1, 'rute_awal' => 'Jakarta', 'rute_tujuan' => 'Depok'],
            ['id' => 2, 'rute_awal' => 'Bandung', 'rute_tujuan' => 'Cimahi'],
        ];
    }

    public static function find($id)
    {
        return collect(self::all())->firstWhere('id', $id);
    }
}
