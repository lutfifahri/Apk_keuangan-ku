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

    // Route untuk Gaji 
    Route::get('/gaji', \App\Livewire\Gaji\Index::class, 'index')->name('gaji');

    // Route untuk Pembayaran
    Route::get('/pembayaran', \App\Livewire\Pembayaran\Index::class, 'index')->name('pembayaran');

    // Route untuk Beli barang
    Route::get('/belibarang', \App\Livewire\BeliBarang\Index::class, 'index')->name('belibarang');

    // Rute logout
    Route::post('/logout', \App\Livewire\Logout::class)->name('logout'); // Jika Anda menggunakan metode POST
});
