<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'brand',
        'price',
        'stock_status',
        'stock_quantity',
        'image_path',
        'model',
        'type',
        'made_in',
        'handsets',
        'answer_system',
        'base_dial_pad',
        'has_perisan',
        'bluetooth',
        'lines',
        'box',
        'condition',
        'grade',
        'is_second_hand',
        'description',
    ];

    // Define the relationship with tags (optional)
    // public function tags()
    // {
    //     return $this->morphToMany(\Spatie\Tags\Tag::class, 'taggable');
    // }
}
