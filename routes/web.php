<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/create-account', function () {
    return view('createAccount');
});

Route::get('/syarat-ketentuan', function () {
    return view('syaratKetentuan');
});

Route::get('/transfers', function () {
    return view('transfer');
});

Route::get('/page-transfer', function () {
    return view('pageTransfer');
});

// Route tidak sesuai, hanya untuk melihat view saja sementara
Route::get('/home', function () {
    return view('home');
});