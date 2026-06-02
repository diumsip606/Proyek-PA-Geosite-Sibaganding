<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
<<<<<<< HEAD
    
=======
    protected $casts = [
        'tags' => 'array', // Memaksa kolom tags selalu menjadi array (jika null, akan jadi array kosong [])
    ];
    
    // Tambahkan baris ini agar semua data dari form diizinkan masuk ke database
    protected $guarded = ['id'];

    // Menggunakan nama tabel tanpa 's'
>>>>>>> f1bbeaed70d0aefc023c8947757b26e86d54fad2
    protected $table = 'destinasi';

    protected $fillable = [
        'nama',
        'slug',
        'kategori_id', 
        'lokasi',
        'deskripsi',
        'sejarah',
        'jarak',
        'rute',
        'maps',
        'qr',
        'gambar'
    ];

   
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    
    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
