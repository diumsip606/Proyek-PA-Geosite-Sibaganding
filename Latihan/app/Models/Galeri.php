<?php
// app/Models/Galeri.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';
    
    // Satpam sudah di-update: slug dan views diizinkan masuk
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'kategori',
        'lokasi',
        'status',
        'views'
    ];

    // tanggal_foto dihapus, cukup status saja yang di-cast ke boolean
    protected $casts = [
        'status' => 'boolean'
    ];

    // Helper folder sudah disesuaikan dengan kategori Sibaganding
    public static function getPathByKategori($kategori)
    {
        return match($kategori) {
            'Biodiversity' => 'image/biodiversity/galeri',
            'Geodiversity' => 'image/geodiversity/galeri',
            'Culture diversity' => 'image/culture/galeri',
            default => 'image/galeri',
        };
    }
}