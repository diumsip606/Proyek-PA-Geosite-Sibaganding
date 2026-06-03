<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarisanGeologi extends Model
{
    protected $table = 'warisan_geologis';

    protected $fillable = [
        'judul',
        'sub_judul',
        'deskripsi',
        'gambar',
        'card_angka',
        'card_teks',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}