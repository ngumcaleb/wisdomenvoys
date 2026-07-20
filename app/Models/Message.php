<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    protected $fillable = [
        'year_id',
        'series_id',
        'category_id',
        'speaker',
        'title',
        'slug',
        'description',
        'thumbnail',
        'audio',
        'video',
        'notes',
        'published_at',
        'featured',
        'downloads',
        'status',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
        'status' => 'boolean',
        'downloads' => 'integer',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Message $message) {
            if (empty($message->slug)) {
                $message->slug = Str::slug($message->title);
            }
        });
    }

    public function year()
    {
        return $this->belongsTo(MessageYear::class, 'year_id');
    }

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function category()
    {
        return $this->belongsTo(MessageCategory::class, 'category_id');
    }

    public function podcast()
    {
        return $this->hasOne(Podcast::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeSearch($query, ?string $term)
    {
        if (!$term) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('speaker', 'like', "%{$term}%")
              ->orWhereHas('series', fn ($sq) => $sq->where('title', 'like', "%{$term}%"))
              ->orWhereHas('year', fn ($yq) => $yq->where('year', 'like', "%{$term}%"));
        });
    }
}
