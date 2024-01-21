<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Filterable;
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'is_published',
        'category_id',
        'game_item_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
