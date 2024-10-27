<?php

use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Login::class)->name('login');


Route::middleware(['auth'])->group(function () {
    // Rute lainnya yang membutuhkan autentikasi
    Route::get('/home', \App\Livewire\Home::class, 'index')->name('home');

    // Rute logout
    Route::post('/logout', \App\Livewire\Logout::class)->name('logout'); // Jika Anda menggunakan metode POST
});
