<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;

Auth::routes();

// トップ画面
Route::get('/', [HelloController::class, 'index']);
// ホーム
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store'])->name('home.store');
// リスト
Route::get('/list', [HomeController::class, 'list'])->name('list');
// 編集フォーム
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::post('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
