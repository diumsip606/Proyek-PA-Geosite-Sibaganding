<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    // Tambahkan baris ini agar semua data dari form diizinkan masuk ke database
    protected $guarded = ['id'];
    
    // Menggunakan nama tabel tanpa 's'
    protected $table = 'destinasi';

    protected $fillable = [
        'nama',
        'slug',
        'kategori_id', // <--- UBAH INI: Tambahkan '_id' karena kita pakai relasi
        'lokasi',
        'deskripsi',
        'sejarah',
        'jarak',
        'rute',
        'maps',
        'qr',
        'gambar'
    ];

    // ---------------------------------------------------
    // RELASI BARU: Ke tabel Kategori (Dari Langkah 3)
    // ---------------------------------------------------
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // ---------------------------------------------------
    // RELASI LAMA: Ke galeri & review (Biarkan saja)
    // ---------------------------------------------------
    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
