<?php
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/create-account', [CreateAccountController::class, 'showCreateAccountForm']);
Route::post('/create-account', [CreateAccountController::class, 'createAccount']);

// Route::POST('/create-account', function () {
//     return view('createAccount');
// });

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