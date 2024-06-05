<?php

use Illuminate\Support\Facades\Route;

route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
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

route::get('/transfers', function () {
    return view('transfer');
});

route::get('/page-transfer', function () {
    return view('pageTransfer');
});