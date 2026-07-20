<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageYear extends Model
{
    protected $fillable = [
        'year',
        'cover_image',
        'status',
    ];

    protected $casts = [
        'year' => 'integer',
        'status' => 'boolean',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'year_id');
    }

    public function podcasts()
    {
        return $this->hasManyThrough(Podcast::class, Message::class, 'year_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeLatest($query)
    {
        return $query->orderByDesc('year');
    }
}
