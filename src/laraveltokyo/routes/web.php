<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ContactController;


Auth::routes();

// トップ画面
Route::get('/', [HelloController::class, 'top']);

// 静的ページ
Route::get('/policy', [HelloController::class, 'policy'])->name('policy');
Route::get('/term', [HelloController::class, 'term'])->name('term');

//回収率計算ツール
Route::get('/recovery', [HelloController::class, 'recovery_view'])->name('recovery_view');
Route::post('/recovery', [HelloController::class, 'recovery'])->name('recovery');

// ホーム
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store'])->name('home.store');

// リスト
Route::get('/list', [ListController::class, 'list'])->name('lists.list');
Route::get('/list/old', [ListController::class, 'listOld'])->name('lists.old');
Route::get('/list/update', [ListController::class, 'listUpdate'])->name('lists.update');
Route::get('/list/maxPurchase', [ListController::class, 'listPurchase'])->name('lists.purchase');
Route::get('/list/maxRefund', [ListController::class, 'listRefund'])->name('lists.refund');

// 編集フォーム
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::post('/delete/{id}', [HomeController::class, 'delete'])->name('delete');

// お問い合わせ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('send');
