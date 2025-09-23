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

});
Auth::routes();

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
// routes/web.php
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/product', [ProductController::class, 'index'])->name('home');

Route::post('/product/upload', [ProductController::class, 'upload'])->name('product.upload');

Route::put('product/{id}', [ProductController::class, 'update'])->name('product.update');




Route::get('/showproducts', function () {
    return view('index');  // หน้า index.blade.php
})->name('showproducts');
