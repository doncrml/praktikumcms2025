<?php

namespace App\Models;

class Pengguna
{
    public static function all()
    {
        return [
            ['id' => 1, 'nama' => 'Andi', 'alamat' => 'Jakarta', 'no_telepon' => '081234567890'],
            ['id' => 2, 'nama' => 'Budi', 'alamat' => 'Bandung', 'no_telepon' => '082345678901'],
        ];
    }

    public static function find($id)
    {
        return collect(self::all())->firstWhere('id', $id);
    }
}
