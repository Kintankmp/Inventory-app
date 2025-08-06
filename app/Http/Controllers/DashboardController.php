<?php

namespace App\Http\Controllers;

use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStock = Item::sum('quantity');
        $totalItems = Item::count();
        $items = Item::all();

        $chartData = [
            'labels' => $items->pluck('name'),
            'data' => $items->pluck('quantity'),
        ];

        return view('dashboard', compact('totalStock', 'totalItems', 'chartData'));
    }
}
