<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function scopeToday($query)
    {
        return $query->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->whereDay('created_at', now()->day);
    }
}
