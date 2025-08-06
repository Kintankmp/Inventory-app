<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|unique:items,item_id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'input_date' => 'required|date',
        ]);

        Item::create([
            'item_id' => $validated['item_id'],
            'name' => $validated['name'],
            'quantity' => $validated['quantity'],
            'input_date' => $validated['input_date'],
        ]);

        return redirect()->route('items.create')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function index(Request $request)
    {
        $query = Item::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('item_id', 'like', '%' . $request->search . '%');
        }

        $items = $query->orderBy('created_at', 'desc')->get();

        return view('items.index', compact('items'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'input_date' => 'required|date',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Barang diperbarui.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Barang dihapus.');
    }

    public function reduceStock(Request $request, Item $item)
    {
        $validated = $request->validate([
            'amount' => 'required|integer|min:1',
        ]);

        $item->quantity -= $validated['amount'];
        $item->save();

        return redirect()->route('items.index')->with('success', 'Stok barang dikurangi.');
    }
}
