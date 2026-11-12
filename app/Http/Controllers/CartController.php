<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // Tambah item ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cek apakah item yang sama sudah ada di keranjang user
        $cart = Cart::where('user_id', auth()->id())
                    ->where('menu_id', $request->menu_id)
                    ->first();

        if ($cart) {
            // Jika sudah ada, tambahkan quantity-nya
            $cart->increment('quantity', $request->quantity);
        } else {
            // Jika belum ada, buat baru
            Cart::create([
                'user_id' => auth()->id(),
                'menu_id' => $request->menu_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    // Hapus item dari keranjang
    public function remove($id)
    {
        Cart::where('id', $id)->where('user_id', auth()->id())->delete();
        return redirect()->back()->with('success', 'Item keranjang berhasil dihapus!');
    }
}