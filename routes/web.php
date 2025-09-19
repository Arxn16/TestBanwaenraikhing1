<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function() {
    // Route สำหรับหน้าแสดงสินค้าของแอดมิน
    Route::get('products', [ProductController::class, 'productsList'])->name('admin.products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    // ใน routes/web.php หรือ routes/admin.php
Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
