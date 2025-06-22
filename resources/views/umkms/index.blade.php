@extends('app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Daftar UMKM Desa</h1>
        <p class="text-gray-600">Jelajahi berbagai usaha mikro, kecil, dan menengah dari desa kami!</p>
    </div>

    @if($umkms->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
            <p class="font-bold">Informasi</p>
            <p>Belum ada UMKM yang terdaftar saat ini.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($umkms as $umkm)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 duration-300">
                    @if($umkm->logo)
                        <img src="{{ asset('storage/' . $umkm->logo) }}" alt="{{ $umkm->nama_umkm }} Logo" class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/400x300?text=Logo+UMKM" alt="Placeholder Logo" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $umkm->nama_umkm }}</h2>
                        <p class="text-gray-600 mb-4 truncate">{{ $umkm->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        <a href="{{ route('umkms.show', $umkm->id) }}" class="inline-block bg-blue-600 text-white hover:bg-blue-700 font-bold py-2 px-4 rounded-full transition duration-300">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection