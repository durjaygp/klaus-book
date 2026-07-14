<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'hero_bullets' => 'array',
            'about_points' => 'array',
            'menu' => 'array',
        ];
    }

    public static function getCached()
    {
        return cache()->rememberForever('homepage_settings', function () {
            return self::first() ?? new self();
        });
    }

    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('homepage_settings');
        });
    }
}
