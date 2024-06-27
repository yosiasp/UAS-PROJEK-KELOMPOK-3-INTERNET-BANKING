<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    // menampilkan halaman main
    public function index()
    {
        return view("main");
    }
}