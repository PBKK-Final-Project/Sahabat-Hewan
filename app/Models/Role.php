<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
            'role'
    ];

    public function users(): HasOne
    {
        return $this->hasOne(User::class, 'role_id', 'id');
    }
}
