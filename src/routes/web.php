<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


// 商品一覧
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 商品詳細
Route::get('/products/detail/{productId}', [ProductController::class, 'detail'])->name('products.detail');


// 商品更新処理
Route::patch('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');

// 商品登録画面
Route::get('/products/register', [ProductController::class, 'register'])->name('products.register');

// 商品登録処理
Route::post('/products/register', [ProductController::class, 'store'])->name('products.store');


// 検索
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// 削除
Route::delete('/products/{productId}/delete', [ProductController::class, 'destroy'])->name('products.delete');
