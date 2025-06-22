<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController; // Import UmkmController
use App\Http\Controllers\PageController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route untuk daftar UMKM
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkms.index');

// Route untuk detail UMKM
// {umkm} adalah wildcard, Laravel akan otomatis mencocokkan dengan ID UMKM
Route::get('/umkm/{umkm}', [UmkmController::class, 'show'])->name('umkms.show');

// Route untuk halaman beranda, sekarang melalui controller
Route::get('/', [UmkmController::class, 'home'])->name('home');

// Anda juga bisa menggunakan Route::resource jika ingin mengelola CRUD secara penuh
// Route::resource('umkm', UmkmController::class);

// Route untuk halaman Kontak
Route::get('/kontak', [PageController::class, 'contact'])->name('contact'); 

// Route untuk memproses pengiriman form Kontak (POST)
Route::post('/kontak', [PageController::class, 'sendContactForm'])->name('contact.send'); 

// Route untuk halaman beranda
Route::get('/', [PageController::class, 'home'])->name('home'); // <--- PASTIKAN INI ADA

// routes/web.php
Route::get('/profil-desa', [PageController::class, 'desaProfile'])->name('desa.profile');

