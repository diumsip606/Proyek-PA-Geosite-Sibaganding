<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'gambar',
        'deskripsi',
        'alamat',
        'harga',
        'kontak',
        'status',
    ];
}