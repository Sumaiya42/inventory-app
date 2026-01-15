<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // only logged-in users can access
    }

    // Show all inventories
    public function index()
    {
        $ownedInventories = Inventory::where('user_id', Auth::id())->get();
        $sharedInventories = Auth::user()->sharedInventories; // via pivot table

        return view('inventories.index', compact('ownedInventories', 'sharedInventories'));
    }

    // Show create form
    public function create()
    {
        return view('inventories.create');
    }

    // Store new inventory
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $inventory = Inventory::create([
    'name' => $request->name,
    'user_id' => Auth::id(),
        ]);

        return redirect()->route('inventories.index')->with('success', 'Inventory created successfully.');
    }

    // Show a single inventory
    public function show(Inventory $inventory)
{
    $inventory->load('items');
    return view('inventories.show', compact('inventory'));
}

}
