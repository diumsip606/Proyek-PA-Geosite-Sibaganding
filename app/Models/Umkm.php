<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'gambar',
        'deskripsi',
        'alamat',
        'kontak',
        'status',
    ];
}