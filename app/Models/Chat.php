<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
        'is_edited',
        'is_deleted',
        'deleted_from_sender',
        'deleted_from_receiver',
    ];

    public function senders(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receivers(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id','id');
    }
}
