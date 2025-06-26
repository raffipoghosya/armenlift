<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'locale',
        'title',
        'description',
        'image',
        'pdf',
        'show_on_hy',
        'show_on_en',
        'show_on_ru',
    ];

    protected $casts = [
        'pdf' => 'array',
        'show_on_hy' => 'boolean',
        'show_on_en' => 'boolean',
        'show_on_ru' => 'boolean',
    ];
}
