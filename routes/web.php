<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class,'index'])->name('products');
Route::get('product/create', [ProductController::class,'create'])->name('products.create');
Route::post('product/store', [ProductController::class,'store'])->name('products.store');
Route::get('product/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('product/{id}/update', [ProductController::class,'update'])->name('products.update');
Route::delete('product/{id}/delete', [ProductController::class,'destroy']);
Route::get('product/{id}/show', [ProductController::class,'show']);
