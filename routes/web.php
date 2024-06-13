<?php
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\HomeController;

Route::get('/', [MainController::class, 'index']);

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/create-account', [CreateAccountController::class, 'index']);
Route::post('/create-account', [CreateAccountController::class, 'createAccount']);

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
Route::get('/home', [HomeController::class, 'index']);


