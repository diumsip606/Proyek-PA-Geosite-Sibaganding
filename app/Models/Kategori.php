<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Memberitahu Laravel nama tabelnya adalah 'kategori'
    protected $table = 'kategori';
    protected $fillable = ['nama', 'slug', 'deskripsi'];

    // Relasi 1: Kategori punya banyak Berita (BIARKAN)
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }

    // Relasi 2: Kategori punya banyak Destinasi (TAMBAHKAN INI)
    public function destinasis()
    {
        return $this->hasMany(Destinasi::class, 'kategori_id');
    }
}
