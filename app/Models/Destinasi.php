<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasi';

    protected $fillable = [
        'nama',
        'slug',
        'lokasi',
        'deskripsi',
        'gambar_utama',
        'tags',
        'kategori_id',
        'admin_id',
        'status',
    ];

    protected $casts = [
        'tags' => 'array',
        'status' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}