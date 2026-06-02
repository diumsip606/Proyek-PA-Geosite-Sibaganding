<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    
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
