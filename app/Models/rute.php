<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $table = 'rute';

    protected $primaryKey = 'id_rute'; // Gunakan nama primary key yang benar
    public $incrementing = false; // Karena Oracle tidak auto-increment
    protected $keyType = 'int';   // Pastikan tipe key adalah integer

    public $timestamps = false;

    protected $fillable = [
        'id_rute', 'rute_awal', 'rute_tujuan',
    ];
}
