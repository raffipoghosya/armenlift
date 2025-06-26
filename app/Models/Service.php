<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'main_image',
        'images',
        'youtube_link',
        'locale',        // <-- ավելացնել
        'show_on_hy',    // <-- ավելացնել
        'show_on_en',    // <-- ավելացնել
        'show_on_ru',    // <-- ավելացնել
    ];

    protected $casts = [
        'images'      => 'array',
        'show_on_hy'  => 'boolean',   // <-- ավելացնել
        'show_on_en'  => 'boolean',   // <-- ավելացնել
        'show_on_ru'  => 'boolean',   // <-- ավելացնել
    ];
}
