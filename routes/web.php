<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ProductController::class, 'ProductController'])->name('products');
Route::post('/add-product',[ProductController::class, 'AddProduct'])->name('add.product');
Route::post('/update-product',[ProductController::class, 'updateProduct'])->name('update.product');
