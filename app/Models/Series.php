<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Series extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Series $series) {
            if (empty($series->slug)) {
                $series->slug = Str::slug($series->title);
            }
        });
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'series_id');
    }
}
