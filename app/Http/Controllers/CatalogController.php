<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;

class CatalogController extends Controller
{
    public function index()
    {
        // Ambil semua data menu dari database
        $menus = Menu::all();
        
        // Ambil keranjang milik user yang sedang login beserta relasi menu-nya
        $cartItems = Cart::with('menu')->where('user_id', auth()->id())->get();

        return view('user.catalog', compact('menus', 'cartItems'));
    }
}