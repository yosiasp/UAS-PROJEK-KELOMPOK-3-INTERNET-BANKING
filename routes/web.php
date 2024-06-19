<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ChangePinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\BalanceInfoController;
use App\Http\Controllers\ChangePhoneController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\LogOutController;
// use App\Http\Controllers\UpdateEmailController;

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/syarat-ketentuan', function () {
    return view('syaratKetentuan');
});

Route::middleware(['guest'])->group(
    function() {
        Route::get('/login', [LogInController::class, 'index'])->name('LogIn');
        Route::post('/login', [LogInController::class, 'login_proses'])->name('login');

        Route::get('/create-account', [CreateAccountController::class, 'index'])->name('accounts');
        Route::post('/create-account', [CreateAccountController::class, 'store'])->name('accounts.store');

        Route::get('/{id}/home', [HomeController::class, 'index'])->name('home');

        Route::get('/{id}/transfer', [TransferController::class, 'index'])->name('transfer');
        Route::post('/{id}/transfer', [TransferController::class, 'store'])->name('transfer.store');

        Route::get('/{id}/mutation', [MutationController::class, 'index'])->name('mutation');

        Route::get('/{id}/change-pin', [ChangePinController::class, 'index'])->name('changePin');
        Route::patch('/{id}/change-pin', [ChangePinController::class, 'updatePin'])->name('change-pin');

        Route::get('/{id}/balanceInfo', [BalanceInfoController::class, 'index'])->name('balanceInfo');

        Route::get('/{id}/change-phone', [ChangePhoneController::class, 'index'])->name('changePhone');
        Route::patch('/{id}/change-phone', [ChangePhoneController::class, 'updatePhone'])->name('change-phone');

        Route::post('/logout', LogOutController::class)->name('logout');
    }
);
/*
Route::middleware(['auth'])->group(
    function() {
        Route::get('/{id}/home', [HomeController::class, 'index'])->name('home');

        Route::get('/{id}/transfer', [TransferController::class, 'index'])->name('transfer');
        Route::post('/{id}/transfer', [TransferController::class, 'store'])->name('transfer.store');

        Route::get('/{id}/mutation', [MutationController::class, 'index'])->name('mutation');

        Route::get('/{id}/change-pin', [ChangePinController::class, 'index'])->name('changePin');
        Route::patch('/{id}/change-pin', [ChangePinController::class, 'updatePin'])->name('change-pin');

        Route::get('/{id}/balanceInfo', [BalanceInfoController::class, 'index'])->name('balanceInfo');

        Route::get('/{id}/change-phone', [ChangePhoneController::class, 'index'])->name('changePhone');
        Route::patch('/{id}/change-phone', [ChangePhoneController::class, 'updatePhone'])->name('change-phone');

        Route::post('/logout', LogOutController::class)->name('logout');
    }
);*/
