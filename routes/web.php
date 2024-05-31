<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to database: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return 'Failed to connect to database: ' . $e->getMessage();
    }
});
