<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Daftarkan kolom yang boleh diisi data
    protected $fillable = [
        'destinasi_id',
        'nama',
        'komentar',
        'rating'
    ];

    // Relasi Balik: Setiap Review adalah milik dari satu Destinasi
    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }
}
