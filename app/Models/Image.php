<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi
    protected $fillable = [
        'title',
        'image_path',
    ];
}
