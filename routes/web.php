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
    Route::get('/create', \App\Livewire\Gaji\Create::class, 'create')->name('gaji.create');

    // Route untuk Pembayaran
    Route::get('/pembayaran', \App\Livewire\Pembayaran\Index::class, 'index')->name('pembayaran');

    // Route untuk Beli barang
    Route::get('/belibarang', \App\Livewire\BeliBarang\Index::class, 'index')->name('belibarang');

    // Route untuk di pinjam
    Route::get('/dipinjam', \App\Livewire\Dipinjam\Index::class, 'index')->name('dipinjam');

    // Route untuk di simpan
    Route::get('/simpan', \App\Livewire\Simpan\Index::class, 'index')->name('simpan');

    // Route untuk uang masuk
    Route::get('/uangmasuk', \App\Livewire\UangMasuk\Index::class, 'index')->name('uangmasuk');

    // Rute logout
    Route::post('/logout', \App\Livewire\Logout::class)->name('logout'); // Jika Anda menggunakan metode POST
});
