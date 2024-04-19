<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
Route::any('/produtos', [ProductController::class, 'store'])->name('products.store');
Route::get('/produtos/cadastro', [ProductController::class, 'register'])->name('products.register');
Route::get('/produtos/listagem', [ProductController::class, 'list'])->name('products.list');
