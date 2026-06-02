<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'kategori_id',
        'lokasi',
        'status',
        'is_hero',
        'views',
    ];

    protected $casts = [
        'status'  => 'boolean',
        'is_hero' => 'boolean',
    ];

    /**
     * Relasi ke Model Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Scope: hanya yang aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', true);
    }

    /**
     * Auto-generate slug sebelum simpan
     */
    protected static function booted()
    {
        static::creating(function ($galeri) {
            if (empty($galeri->slug)) {
                $galeri->slug = Str::slug($galeri->judul) . '-' . time();
            }
        });
    }
}