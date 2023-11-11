<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function products(): HasOne
    {
        return $this->hasOne(Product::class, 'type_id', 'id');
    }

}
