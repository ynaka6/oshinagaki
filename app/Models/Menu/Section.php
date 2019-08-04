<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Menu;
use App\Models\Menu\Section\Item;

class Section extends Model
{
    /**
     * テーブル
     *
     * @var string
     */
    protected $table = 'menu_sections';

    protected $fillable = [
        'menu_id', 'title'
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'menu_section_id');
    }

}
