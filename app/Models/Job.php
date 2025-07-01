<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'main_image',
        'images',
        'youtube_link',
        'address',
        'locale',        // Added for localization
        'show_on_hy',    // Armenian display flag
        'show_on_en',    // English display flag
        'show_on_ru',    // Russian display flag
        'type',
    ];

    protected $casts = [
        'images'     => 'array',
        'show_on_hy' => 'boolean',
        'show_on_en' => 'boolean',
        'show_on_ru' => 'boolean',
    ];
}
