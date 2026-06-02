<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktaUnik extends Model
{
    use HasFactory;

    protected $table = 'fakta_uniks';

    protected $fillable = [
        'nomor',
        'judul',
        'deskripsi',
        'tag',
        'x_koordinat',
        'y_koordinat',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'x_koordinat' => 'double',
        'y_koordinat' => 'double',
    ];
}
