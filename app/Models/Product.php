<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'pdf', // ✅ Ավելացրու այս դաշտը
    ];

    protected $casts = [
        'pdf' => 'array', // ✅ սա ապահովում է, որ array-ով պահվի և ճիշտ վերադարձնի
    ];
}
