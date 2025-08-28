<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('berita');   // halaman utama (daftar berita)
});

Route::get('/berita', function () {
    return view('berita');   // route untuk daftar berita
});

Route::get('/berita/detail/{id}', function ($id) {
    return view('detailberita', ['id' => $id]);  // route untuk detail berita
});
