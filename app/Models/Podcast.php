<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $fillable = [
        'message_id',
        'audio',
        'spotify',
        'apple',
        'google',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
