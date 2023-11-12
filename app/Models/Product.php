<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [        
        'name',
        'description',
        'price',
        'category_id',
        'type_id',
        'image',
        'stock',
        'condition',
        'shortname',
        'sold',
    ];

    public function types(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function product_reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class,'product_id', 'id');
    }
}
