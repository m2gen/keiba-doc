<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;

Auth::routes();

// ホーム
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store'])->name('total');

// リスト
Route::get('/list', [HomeController::class, 'list'])->name('list');
Route::post('/list', [HomeController::class, 'store'])->name('list.store');

Route::get('/', [HelloController::class, 'index']);
