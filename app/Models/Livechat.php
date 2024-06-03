<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livechat extends Model
{
    use HasFactory;

    function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id')->select('id', 'image');
    }

    function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id')->select('id', 'image');
    }
}
