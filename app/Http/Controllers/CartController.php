<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->validate([
            'menu_id'  => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1|max:50',
            'note'     => 'nullable|string|max:150',
        ]);

        $menu   = Menu::findOrFail($data['menu_id']);
        $userId = auth()->id();
        $note   = filled($data['note'] ?? null) ? trim($data['note']) : null;

        $inCart = (int) Cart::where('user_id', $userId)
            ->where('menu_id', $menu->id)
            ->sum('quantity');

        if ($menu->stock < 1) {
            return $this->respond($request, "{$menu->name} sedang habis.", false, 422);
        }

        if ($inCart + $data['quantity'] > $menu->stock) {
            $sisa = max($menu->stock - $inCart, 0);

            return $this->respond(
                $request,
                "Stok {$menu->name} tersisa {$menu->stock} (kamu sudah punya {$inCart} di keranjang, bisa tambah {$sisa} lagi).",
                false,
                422
            );
        }

        // Menu & note sama → gabung qty, note beda → baris terpisah
        $existing = Cart::where('user_id', $userId)
            ->where('menu_id', $menu->id)
            ->where('note', $note)
            ->first();

        if ($existing) {
            $existing->increment('quantity', $data['quantity']);
        } else {
            Cart::create([
                'user_id'  => $userId,
                'menu_id'  => $menu->id,
                'quantity' => $data['quantity'],
                'note'     => $note,
            ]);
        }

        return $this->respond($request, 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function remove(Request $request, $id)
    {
        Cart::where('id', $id)->where('user_id', auth()->id())->delete();

        return $this->respond($request, 'Item keranjang berhasil dihapus!');
    }

    private function respond(Request $request, string $message, bool $ok = true, int $status = 200)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => $message,
                'cart'    => Cart::summaryFor(auth()->id()),
            ], $status);
        }

        return back()->with($ok ? 'success' : 'error', $message);
    }
}
