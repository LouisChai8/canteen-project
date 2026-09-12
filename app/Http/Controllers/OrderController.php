<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('user.orders');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function history()
    {
        $histories = [
            [
                'order_id' => '#ORD-20260909-08',
                'date' => '09 Sep 2026 • 10:15 WIB',
                'status' => 'Selesai',
                'total' => 18000,
                'items' => [
                    [
                        'name' => 'Ayam Geprek', 
                        'qty' => 1, 
                        'note' => 'Level Pedas 2', 
                        'price' => 10000,
                        'image' => 'images/Geprek.png'
                    ],
                    [
                        'name' => 'Thai Tea', 
                        'qty' => 1, 
                        'note' => 'Normal Ice', 
                        'price' => 8000,
                        'image' => 'images/Thai.png'
                    ],
                ]
            ],
            [
                'order_id' => '#ORD-20260905-02',
                'date' => '05 Sep 2026 • 12:30 WIB',
                'status' => 'Dibatalkan',
                'total' => 20000,
                'items' => [
                    [
                        'name' => 'Kentang Goreng', 
                        'qty' => 2, 
                        'note' => '-', 
                        'price' => 20000,
                        'image' => 'images/Fries.png'
                    ],
                ]
            ],
        ];

        return view('user.history', compact('histories'));
    }
}