@extends('app')

@section('content')
    <section class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Hubungi Kami</h1>

        <div class="max-w-3xl mx-auto">
            <p class="text-lg text-gray-700 mb-6 text-center">
                Ada pertanyaan atau ingin bermitra dengan UMKM Desa Maju? Jangan ragu untuk menghubungi kami!
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-left">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Informasi Kontak</h3>
                    <p class="text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-600"></i> {{-- Ikon Email --}}
                        <strong>Email:</strong> info@umkmdesadangiang.com
                    </p>
                    <p class="text-gray-700 mb-2">
                        <i class="fas fa-phone mr-2 text-blue-600"></i> {{-- Ikon Telepon --}}
                        <strong>Telepon:</strong> +62 857-9337-5492
                    </p>
                    <p class="text-gray-700">
                        <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i> {{-- Ikon Alamat --}}
                        <strong>Alamat:</strong> Kampung Cikuwiwi, Desa Dangiang, Kec. Cilawu, Kab. Garut, 44181
                    </p>
                </div>

                <div class="text-left">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Jam Operasional</h3>
                    <p class="text-gray-700 mb-2">Senin - Jumat: 09:00 - 17:00 WIB</p>
                    <p class="text-gray-700">Sabtu: 09:00 - 14:00 WIB</p>
                    <p class="text-gray-700 italic">Minggu dan Hari Libur Nasional: Tutup</p>
                </div>
            </div>

            <div class="mt-10">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Kirim Pesan Kepada Kami</h3>
                <p class="text-gray-600 text-center mb-6">Untuk pertanyaan lebih lanjut, silakan isi formulir di bawah ini:</p>
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 p-6 bg-gray-50 rounded-lg shadow-inner">
                    @csrf {{-- <--- PENTING: Tambahkan ini untuk keamanan Laravel! --}}

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label for="name" class="block text-gray-800 text-sm font-semibold mb-2">Nama Lengkap:</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Nama Lengkap Anda" value="{{ old('name') }}"> {{-- old('name') untuk menjaga input jika ada error --}}
                    </div>
                    <div>
                        <label for="email" class="block text-gray-800 text-sm font-semibold mb-2">Email:</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="email@contoh.com" value="{{ old('email') }}"> {{-- old('email') --}}
                    </div>
                    <div>
                        <label for="subject" class="block text-gray-800 text-sm font-semibold mb-2">Subjek:</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Subjek Pesan Anda" value="{{ old('subject') }}"> {{-- old('subject') --}}
                    </div>
                    <div>
                        <label for="message" class="block text-gray-800 text-sm font-semibold mb-2">Pesan Anda:</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea> {{-- old('message') --}}
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full focus:outline-none focus:shadow-outline transition duration-300 transform hover:scale-105">Kirim Pesan</button>
                    </div>
                </form>            
            </div>
        </div>
    </section>
@endsection