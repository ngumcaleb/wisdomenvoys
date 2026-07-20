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
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
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
