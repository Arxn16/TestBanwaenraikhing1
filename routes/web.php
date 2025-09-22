<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticatedSessionController;



Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function() {
    // Route สำหรับหน้าแสดงสินค้าของแอดมิน
 
    // ใน routes/web.php หรือ routes/admin.php
Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes/web.php
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

