<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Produk; // <--- PASTIKAN INI ADA
use App\Models\Umkm; // <--- PASTIKAN INI ADA (meskipun tidak langsung digunakan di home(), baik untuk kelengkapan)


class PageController extends Controller
{
    /**
     * Display the home page with featured products.
     */
    public function home() // <--- TAMBAHKAN METODE INI
    {
        // Ambil produk unggulan, pastikan relasi UMKM juga dimuat
        // Menggunakan take(6) untuk hanya mengambil 6 produk
        $featuredProducts = Produk::with('umkm')->take(6)->get();

        return view('welcome', compact('featuredProducts'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact'); // Mengembalikan view 'contact.blade.php'
    }

    // Misalnya di PageController.php
    public function desaProfile()
    {
    // Anda bisa mengambil data dari database di sini jika ada
    // $desaProfile = DesaProfile::first();
        return view('desa.profile'); // Buat view ini nanti
    }

    /**
     * Handle the contact form submission.
     */
    public function sendContactForm(Request $request)
    {
        // 1. Validasi input form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Kirim email
        Mail::to('farhannursidiq2@gmail.com')->send(new ContactFormMail($validatedData));

        // 3. Beri feedback kepada pengguna
        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah berhasil terkirim.');
    }
}