<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'menu_id', 'quantity', 'note'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Cart state in the shape the frontend drawer consumes. */
    public static function summaryFor(int $userId): array
    {
        $items = static::with('menu')
            ->where('user_id', $userId)
            ->latest()
            ->get()
            ->map(fn ($c) => [
                'id'       => $c->id,
                'menu_id'  => $c->menu_id,
                'name'     => $c->menu->name,
                'price'    => (int) $c->menu->price,
                'qty'      => $c->quantity,
                'note'     => $c->note,
                'subtotal' => (int) $c->menu->price * $c->quantity,
            ])
            ->values();

        return [
            'items' => $items,
            'count' => $items->sum('qty'),
            'total' => $items->sum('subtotal'),
        ];
    }
}