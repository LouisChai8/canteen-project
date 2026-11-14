<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        if (! in_array($category, Menu::CATEGORIES, true)) {
            $category = null;
        }

        $search = trim($request->query('q', ''));

        $menus = Menu::query()
            ->category($category)
            ->search($search)
            ->orderBy('name')
            ->get();

        $menuData = Menu::all()->mapWithKeys(fn ($m) => [
            $m->id => [
                'id'          => $m->id,
                'name'        => $m->name,
                'price'       => $m->price,
                'description' => $m->description,
                'image'       => $m->image_url,
            ],
        ]);

        // Best seller: Nasi Ayam Geprek, Es Matcha Latte, dan Kentang Goreng
        $bestSellers = Menu::whereIn('name', ['Nasi Ayam Geprek', 'Es Matcha Latte', 'Kentang Goreng'])->get();

        return view('user.catalog', [
            'menus'       => $menus,
            'bestSellers' => $bestSellers,
            'categories'  => Menu::CATEGORIES,
            'category'    => $category,
            'search'      => $search,
            'menuData'    => $menuData,
            'cartSummary' => Cart::summaryFor(auth()->id()),
        ]);
    }
}