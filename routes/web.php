<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Dashboard redirects to inventories list
    Route::get('/dashboard', function () {
        return redirect()->route('inventories.index');
    })->name('dashboard');

    // ----------------------
    // Inventories Routes
    // ----------------------
    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
    Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
    Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store');
    Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->name('inventories.show');

    // ----------------------
    // Items Routes
    // ----------------------
    Route::get('/inventories/{inventory}/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/inventories/{inventory}/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/inventories/{inventory}/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/inventories/{inventory}/items/{item}', [ItemController::class, 'update'])->name('items.update');
});

// ----------------------
// Admin Routes
// ----------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Include authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
