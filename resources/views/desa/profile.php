@extends('app')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Profil Desa [Nama Desa Anda]</h1>
        <p class="text-gray-600 text-lg mb-6">Mengenal lebih dekat desa kami.</p>

        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Sejarah Singkat</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Desa [Nama Desa Anda] didirikan pada tahun XXXX, dengan latar belakang sejarah yang kaya akan...
        </p>

        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Visi & Misi</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            **Visi:** Lorem ipsum dolor sit amet...<br>
            **Misi:** Lorem ipsum dolor sit amet...
        </p>

        {{-- Tambahkan bagian-bagian lain seperti Geografis, Demografi, Potensi, Galeri, dll. --}}

        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Galeri Desa</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <img src="{{ asset('img/desa_1.jpg') }}" alt="Gambar Desa 1" class="w-full h-48 object-cover rounded-lg shadow-md">
            <img src="{{ asset('img/desa_2.jpg') }}" alt="Gambar Desa 2" class="w-full h-48 object-cover rounded-lg shadow-md">
            </div>
    </div>
@endsection