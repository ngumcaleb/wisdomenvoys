<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'stream_id',
        'name',
        'role',
        'bio',
        'photo',
        'email',
        'phone',
        'featured',
        'status',
        'is_founder',
        'is_stream_lead',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'is_founder' => 'boolean',
        'is_stream_lead' => 'boolean',
    ];

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
