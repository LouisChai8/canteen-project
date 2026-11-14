<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public const CATEGORIES = ['Makanan', 'Minuman', 'Cemilan'];

    protected $fillable = ['name', 'category', 'price', 'description', 'image'];

    protected $casts = [
        'price' => 'integer',
    ];

    public function scopeCategory(Builder $query, ?string $category): Builder
    {
        return $query->when(
            in_array($category, self::CATEGORIES, true),
            fn ($q) => $q->where('category', $category)
        );
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        $term = trim((string) $term);

        return $query->when($term !== '', function ($q) use ($term) {
            $like = '%' . addcslashes($term, '%_\\') . '%';
            $q->where(fn ($w) => $w->where('name', 'like', $like)->orWhere('description', 'like', $like));
        });
    }

    public function getImageUrlAttribute(): string
    {
        return asset($this->image ?: 'images/placeholder.png');
    }
}