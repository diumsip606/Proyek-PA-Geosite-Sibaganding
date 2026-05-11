<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';
    
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'kategori_id', // UBAH: dari 'kategori' menjadi 'kategori_id' agar sinkron dengan relasi
        'lokasi',
        'status',
        'views'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * Relasi ke Model Kategori
     * Karena sekarang dinamis, Galeri "milik" sebuah Kategori
     */
    public function kategori()
    {
        // Pastikan nama kolom di tabel galeris adalah 'kategori_id'
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Helper folder (Opsional)
     * Jika kamu menggunakan tabel dinamis, helper ini mungkin perlu disesuaikan 
     * karena $kategori sekarang berupa objek, bukan string 'Biodiversity' lagi.
     */
    public static function getPathByKategori($namaKategori)
    {
        return match($namaKategori) {
            'Biodiversity' => 'image/biodiversity/galeri',
            'Geodiversity' => 'image/geodiversity/galeri',
            'Culture diversity' => 'image/culture/galeri',
            default => 'image/galeri',
        };
    }
}