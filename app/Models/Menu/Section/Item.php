<?php

namespace App\Models\Menu\Section;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Menu\Section;

class Item extends Model
{
    /**
     * テーブル
     *
     * @var string
     */
    protected $table = 'menu_section_items';

    protected $fillable = [
        'menu_section_id', 'title'
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'menu_section_id');
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . static::FILE_DIR . '/' . $this->file);
    }
}
