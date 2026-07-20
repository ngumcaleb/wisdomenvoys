<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = [
        'name',
        'title',
        'photo',
        'bio',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'is_team_leader',
        'display_order',
    ];

    protected $casts = [
        'is_team_leader' => 'boolean',
        'display_order' => 'integer',
    ];

    public function scopeTeamLeader($query)
    {
        return $query->where('is_team_leader', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
