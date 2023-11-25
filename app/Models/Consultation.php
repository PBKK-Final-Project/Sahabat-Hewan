<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',
        'harga'
    ];

    public function dokters(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dokter_id', 'id');
    }
}
