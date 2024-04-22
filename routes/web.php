<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
Route::get('/produtos/cadastro', [ProductController::class, 'register'])->name('products.register');
Route::get('/produtos/listagem', [ProductController::class, 'list'])->name('products.list');
Route::post('/produtos', [ProductController::class, 'store'])->name('products.store');
Route::put('/produtos', [ProductController::class, 'edit'])->name('products.edit');

Route::get('/estruturas', [StructureController::class, 'index'])->name('structures.index');
Route::get('/estruturas/cadastro', [StructureController::class, 'register'])->name('structures.register');
Route::get('/estruturas/listagem', [StructureController::class, 'list'])->name('structures.list');
