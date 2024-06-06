<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/costumer-service', function () {
    return view('costumerService');
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