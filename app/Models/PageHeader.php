<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHeader extends Model
{
    protected $fillable = [
        'page_name',
        'label',
        'title',
        'subtitle',
        'gambar',
    ];

    /**
     * Get header by page_name
     */
    public static function forPage(string $pageName): ?self
    {
        return static::where('page_name', $pageName)->first();
    }
}
