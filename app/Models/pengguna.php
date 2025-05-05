<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id_pengguna',
        'nama',
        'alamat',
        'no_telepon',
    ];

    public function getKeyName()
    {
        return 'id_pengguna';
    }
}
