<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function products(): HasOne
    {
        return $this->hasOne(Product::class, 'category_id', 'id');
    }
}
