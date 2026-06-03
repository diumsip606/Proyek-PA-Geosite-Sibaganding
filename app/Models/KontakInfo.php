<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakInfo extends Model
{
    protected $table = 'kontak_info';

    protected $fillable = [
        'tipe',
        'label',
        'nilai',
        'icon',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk filter hanya yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk filter berdasarkan tipe
     */
    public function scopeByTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }
}
