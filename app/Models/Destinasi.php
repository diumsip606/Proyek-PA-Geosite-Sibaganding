<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $casts = [
        'tags' => 'array',
    ];
    
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
        'gambar_utama'
    ];

   
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
