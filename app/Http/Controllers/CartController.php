<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;

class CartController extends Controller
{
    // Tambah item ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        // Cek apakah item dengan menu dan catatan yang sama sudah ada di keranjang user
        $cart = Cart::where('user_id', auth()->id())
                    ->where('menu_id', $request->menu_id)
                    ->where('note', $request->note)
                    ->first();

        if ($cart) {
            $cart->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'menu_id' => $request->menu_id,
                'quantity' => $request->quantity,
                'note' => $request->note,
            ]);
        }

        // Return JSON response untuk AJAX / Floating Cart
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'message' => $menu->name . ' berhasil ditambahkan ke keranjang!',
                'cart' => Cart::summaryFor(auth()->id())
            ]);
        }

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    // Hapus item dari keranjang
    public function remove($id, Request $request)
    {
        Cart::where('id', $id)->where('user_id', auth()->id())->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'message' => 'Item keranjang berhasil dihapus!',
                'cart' => Cart::summaryFor(auth()->id())
            ]);
        }

        return redirect()->back()->with('success', 'Item keranjang berhasil dihapus!');
    }
}