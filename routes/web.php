<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::view('/login', 'login')->name('login');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');

Route::get('/berita/{slug}', [NewsController::class, 'show'])
    ->where('slug', '[A-Za-z0-9\-]+')
    ->name('news.show');

Route::get('/kegiatan', [ActivityController::class, 'index'])->name('kegiatan');

Route::get('/kegiatan/{slug}', [ActivityController::class, 'show'])
    ->where('slug', '[A-Za-z0-9\-]+')
    ->name('activities.show');