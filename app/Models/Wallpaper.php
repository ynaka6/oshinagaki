<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;


class Wallpaper extends Model
{
    
    const FILE_DIR = 'uploads/wallpaper';

    protected $fillable = [
        'user_id', 'name', 'file', 'type'
    ];

    protected $appends = [
        'url'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . static::FILE_DIR . '/' . $this->file);
    }
}
