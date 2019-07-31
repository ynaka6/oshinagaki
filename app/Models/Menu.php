<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\User;
use App\Models\Menu\Section;

class Menu extends Model
{
    protected $fillable = [
        'user_id', 'wallpaper_id', 'date', 'signature_title', 'signature_name'
    ];

    protected $dates = [
        'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function font(): BelongsTo
    {
        return $this->belongsTo(Font::class);
    }
    public function wallpaper(): BelongsTo
    {
        return $this->belongsTo(Wallpaper::class);
    }
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . static::FILE_DIR . '/' . $this->file);
    }
}
