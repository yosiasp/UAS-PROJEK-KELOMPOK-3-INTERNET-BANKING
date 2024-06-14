<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\MutationController;

Route::get('/', [MainController::class, 'index']);

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/home', [MainController::class, 'index'])->name('home');
Route::post('/login', [MainController::class, 'login'])->name('home.login');

Route::get('/create-account', [CreateAccountController::class, 'index']) -> name('accounts');
Route::post('/create-account', [CreateAccountController::class, 'store']) -> name('accounts.store');

Route::get('/syarat-ketentuan', function () {
    return view('syaratKetentuan');
});

// Route tidak sesuai, hanya untuk melihat view saja sementara
Route::get('/transfer', [TransferController::class, 'index']);

// Route tidak sesuai, hanya untuk melihat view saja sementara
Route::get('/mutation', [MutationController::class, 'index']);

// Route tidak sesuai, hanya untuk melihat view saja sementara
Route::get('/home', [HomeController::class, 'index'])->name('home');




