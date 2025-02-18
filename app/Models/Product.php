<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'user_id',
        'category_id',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Definē saistību starp Product un Category modeļiem
    // Norāda, ka katrs produkts pieder vienai kategorijai
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
