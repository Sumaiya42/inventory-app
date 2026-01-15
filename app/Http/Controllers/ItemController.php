<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Inventory $inventory)
    {
        return view('items.create', compact('inventory'));
    }

    public function store(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $inventory->items()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('inventories.show', $inventory)
                         ->with('success', 'Item added successfully!');
    }

    public function edit(Inventory $inventory, Item $item)
    {
        return view('items.edit', compact('inventory', 'item'));
    }

    public function update(Request $request, Inventory $inventory, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('inventories.show', $inventory)
                         ->with('success', 'Item updated successfully!');
    }
}
