<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoYoutube extends Model
{
    use HasFactory;

    protected $table = 'video_youtubes';

    protected $fillable = [
        'judul',
        'deskripsi',
        'youtube_id',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
