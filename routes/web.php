<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/create', [BlogController::class, 'create'])->name('create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('store');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('edit');
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('update');
Route::delete('/blog/delete/{id}', [BlogController::class, 'delete'])->name('delete');
