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
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\UpdateProfileController; 
use App\Http\Controllers\AccountListController; 

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/syarat-ketentuan', function () {
    return view('syaratKetentuan');
});

Route::get('/login', [LogInController::class, 'index'])->name('LogIn');
Route::post('/login', [LogInController::class, 'login_proses'])->name('login');

Route::get('/create-account', [CreateAccountController::class, 'index'])->name('accounts');
Route::post('/create-account', [CreateAccountController::class, 'store'])->name('accounts.store');
Route::get('/check-username', [CreateAccountController::class, 'checkUsername'])->name('check-username');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/{id}/home', [HomeController::class, 'index'])->name('home');

    Route::get('/{id}/transfer', [TransferController::class, 'index'])->name('transfer');
    Route::post('/{id}/transfer', [TransferController::class, 'store'])->name('transfer.store');

    Route::get('/{id}/mutation', [MutationController::class, 'index'])->name('mutation');

    Route::get('/{id}/change-pin', [ChangePinController::class, 'index'])->name('changePin');
    Route::patch('/{id}/change-pin', [ChangePinController::class, 'updatePin'])->name('change-pin');

    Route::get('/{id}/balanceInfo', [BalanceInfoController::class, 'index'])->name('balanceInfo');  

    Route::get('/{id}/change-phone', [ChangePhoneController::class, 'index'])->name('changePhone');
    Route::patch('/{id}/change-phone', [ChangePhoneController::class, 'updatePhone'])->name('change-phone');

    Route::get('/{id}/change-email', [ChangeEmailController::class, 'index'])->name('changeEmail');
    Route::patch('/{id}/change-email', [ChangeEmailController::class, 'updateEmail'])->name('change-email');
        
    Route::get('/{id}/update-profile', [UpdateProfileController::class, 'index'])->name('updateProfile');
    Route::patch('/{id}/update-profile', [UpdateProfileController::class, 'updateProfile'])->name('update-profile');

    Route::get('/{id}/accountList', [AccountListController::class, 'index'])->name('accountList');
    Route::post('/{id}/accountList', [AccountListController::class, 'storeAccount'])->name('account-list');

    Route::delete('/logout', LogOutController::class)->name('logout');
});