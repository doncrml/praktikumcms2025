<?php

namespace App\Models;

class Pengemudi
{
    public static function all()
    {
        return [
            ['id' => 1, 'nama' => 'Joko', 'no_sim' => 'SIM123456'],
            ['id' => 2, 'nama' => 'Siti', 'no_sim' => 'SIM654321'],
        ];
    }

    public static function find($id)
    {
        return collect(self::all())->firstWhere('id', $id);
    }
}
