<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm; // Import model Umkm
use App\Models\Produk; // Import model Produk
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    /**
     * Display a listing of the UMKM.
     */
    public function index()
    {
        // Mengambil semua data UMKM dari database
        $umkms = Umkm::all();

        // Mengirim data UMKM ke view 'umkms.index'
        return view('umkms.index', compact('umkms'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm)
    {
        // Muat relasi 'produks' dari UMKM
        // Pastikan juga 'nomor_telepon' ada di model Umkm (dari migrasi yang sudah dibuat)
        $umkm->load('produks'); // Ini akan memuat semua produk yang terkait dengan UMKM ini

        return view('umkms.show', compact('umkm'));
    } 
    public function home()
    {
        // Mengambil 3 produk terbaru sebagai produk unggulan
        // Anda bisa menyesuaikan jumlah dan kriteria pengambilan produk di sini
        $featuredProducts = Produk::with('umkm')->latest()->get();

        // Mengirim data produk unggulan ke view 'welcome'
        return view('welcome', compact('featuredProducts'));
    }
}