<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stream extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'status',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Stream $stream) {
            if (empty($stream->slug)) {
                $stream->slug = Str::slug($stream->name);
            }
        });
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
