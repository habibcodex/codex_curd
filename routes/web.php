<?php

use App\Http\Controllers\productcontroller;
use Illuminate\Support\Facades\Route;



Route::get('/index',[productcontroller::class,'index'])->name('index');
Route::get('/create',[productcontroller::class,'create'])->name('create');
Route::post('/store',[productcontroller::class,'store'])->name('store');





Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');




Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');