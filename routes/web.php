<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('berita');   // halaman utama (daftar berita)
});

Route::get('/berita', function () {
    return view('berita');   // route untuk daftar berita
});

Route::get('/berita/detail/{bulan}/{id}', function ($bulan, $id) {
    return view('detailberita', [
        'bulan' => $bulan,
        'id' => $id
    ]);  // route untuk detail berita sesuai bulan dan id
});
