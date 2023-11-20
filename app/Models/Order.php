<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'external_id',
        'email',
        'shipping_status',
        'paid_status',
        'payment_url',
    ];

    public function users(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

}
