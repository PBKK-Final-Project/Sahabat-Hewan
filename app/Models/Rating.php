<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "product_id",
        "rating",
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class,"product_id", "id");
    }
}
