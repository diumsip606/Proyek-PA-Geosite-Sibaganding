<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasi';

    protected $fillable = [
        'nama',
        'slug',
        'kategori',
        'lokasi',
        'deskripsi',
        'sejarah',
        'jarak',
        'rute',
        'maps',
        'qr',
        'gambar'
    ];

    // Relasi ke galeri
    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    // Relasi ke review
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}