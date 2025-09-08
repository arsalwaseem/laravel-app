<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'checkadmin'])->group(function () {
    Route::get('/admin', function () {
        return "Welcome Admin";
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/products', function () {
    //     $products = Product::all();
    //     return $products;
    // });
Route::get('/products', [ProductApiController::class, 'index']); 

    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products-store', [ProductController::class, 'store']);
    Route::get('/product-data/delete/{id}', [ProductController::class, 'delete']);
    Route::post('/product-data/{id}', [ProductController::class, 'update']);
    Route::get('/product-data/{id}/edit', [ProductController::class, 'edit']);
});

require __DIR__ . '/auth.php';
