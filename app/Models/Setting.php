<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
        'linkedin',
        'spotify',
        'copyright',
        'hero_home_image',
        'hero_about_image',
        'hero_download_image',
        'hero_services_image',
        'hero_products_image',
        'hero_podcasts_image',
        'hero_partnership_image',
    ];

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'site_name' => 'Wisdom Envoys Ministry',
            'copyright' => '© ' . date('Y') . ' Wisdom Envoys Ministry. All Rights Reserved.',
        ]);
    }
}
