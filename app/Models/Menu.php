<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\User;
use App\Models\Menu\Section;
use App\Models\Menu\Section\Item;
use Carbon\Carbon;

class Menu extends Model
{
    protected $perPage = 10;

    protected $fillable = [
        'user_id', 'font_id', 'wallpaper_id', 'date', 'signature_title', 'signature_name'
    ];

    protected $dates = [
        'date'
    ];

    protected $with = [
        'font',
        'wallpaper',
        'sections',
        'sections.items'
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


    public function findPage(int $next = null): array
    {
        $menus = $this->when($next ?? null, function ($query, $search) {
                $query->where('date', '<=', Carbon::createFromTimestamp($search));
            })
            ->orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->limit($this->perPage + 1)
            ->get()
        ;

        $next = null;
        if (count($menus) >= $this->perPage + 1) {
            $m = $menus->pop();
            $next = $m->date->getTimestamp();
        }

        $result = [ 'menus' => $menus ];
        if ($next) {
            $result['next'] = $next;
        }
        return $result;
    }
    public function create(array $attribute): Menu
    {
        $this->fill($attribute)->save();
        if (
            isset($attribute['sections'])
            && is_array($attribute['sections'])
        ) {
            foreach($attribute['sections'] as $attributeSection) {
                $section = $this->sections()->create($attributeSection);
                if (
                    isset($attributeSection['items'])
                    && is_array($attributeSection['items'])
                ) {
                    foreach($attributeSection['items'] as $attributeItem) {
                        $item = $section->items()->create($attributeItem);
                    }
                }
            }
        }

        return $this;
    }
    public function update(array $attribute = [], array $options = []): Menu
    {
        Item::whereIn('menu_section_id', $this->sections()->pluck('id'))->delete();
        $this->sections()->delete();

        $this->fill($attribute)->save($options);
        if (
            isset($attribute['sections'])
            && is_array($attribute['sections'])
        ) {
            foreach($attribute['sections'] as $attributeSection) {
                $section = $this->sections()->create($attributeSection);
                if (
                    isset($attributeSection['items'])
                    && is_array($attributeSection['items'])
                ) {
                    foreach($attributeSection['items'] as $attributeItem) {
                        $item = $section->items()->create($attributeItem);
                    }
                }
            }
        }
        return $this;
    }
}
