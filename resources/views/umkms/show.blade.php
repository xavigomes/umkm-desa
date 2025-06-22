@extends('app')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        {{-- ... Konten UMKM yang ada di bagian atas (logo, nama, alamat, tentang kami, kontak) ... --}}
        <div class="flex items-center mb-6">
            @if($umkm->logo)
                <img src="{{ asset('storage/' . $umkm->logo) }}" alt="{{ $umkm->nama_umkm }} Logo" class="w-24 h-24 object-cover rounded-full mr-6">
            @else
                <img src="https://via.placeholder.com/96x96?text=Logo" alt="Placeholder Logo" class="w-24 h-24 object-cover rounded-full mr-6">
            @endif
            <div>
                <h1 class="text-4xl font-bold text-gray-800">{{ $umkm->nama_umkm }}</h1>
                <p class="text-xl text-gray-600">{{ $umkm->alamat }}</p>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Tentang Kami</h2>
        <p class="text-gray-700 leading-relaxed mb-6">{{ $umkm->deskripsi ?? 'Tidak ada deskripsi.' }}</p>

        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Kontak</h2>
        <ul class="text-gray-700 mb-6">
            @if($umkm->nomor_telepon)
                <li class="mb-2"><strong class="font-semibold">Telepon:</strong> {{ $umkm->nomor_telepon }}</li>
            @endif
            @if($umkm->kontak_email)
                <li class="mb-2"><strong class="font-semibold">Email:</strong> <a href="mailto:{{ $umkm->kontak_email }}" class="text-blue-600 hover:underline">{{ $umkm->kontak_email }}</a></li>
            @endif
            @if($umkm->link_media_sosial)
                <li class="mb-2"><strong class="font-semibold">Media Sosial:</strong> <a href="{{ $umkm->link_media_sosial }}" target="_blank" class="text-blue-600 hover:underline">Kunjungi Kami</a></li>
            @endif
            @if(!$umkm->nomor_telepon && !$umkm->kontak_email && !$umkm->link_media_sosial)
                <li>Tidak ada informasi kontak yang tersedia.</li>
            @endif
        </ul>
    </div> {{-- Penutup div.bg-white untuk detail UMKM --}}

    {{-- Section untuk Produk --}}
    <section class="mt-8 mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Produk dari {{ $umkm->nama_umkm }}</h2>
        @if($umkm->produks->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">Informasi</p>
                <p>UMKM ini belum memiliki produk yang terdaftar.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($umkm->produks as $produk)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-300 cursor-pointer product-card"
                         data-id="{{ $produk->id }}"
                         data-nama="{{ $produk->nama_produk }}"
                         data-deskripsi="{{ $produk->deskripsi }}"
                         data-harga="{{ $produk->harga }}"
                         data-gambar="{{ $produk->gambar }}"
                         data-umkm-id="{{ $umkm->id }}"
                         data-umkm-name="{{ $umkm->nama_umkm }}"
                         data-umkm-phone="{{ $umkm->nomor_telepon }}">
                        @if($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Produk" alt="Placeholder Produk" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $produk->nama_produk }}</h3>
                            <p class="text-blue-600 text-lg font-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- Tombol Kembali ke Daftar UMKM - Ditempatkan di sini --}}
    <div class="mt-8 text-center"> {{-- Menambahkan text-center agar tombol di tengah --}}
        <a href="{{ route('umkms.index') }}" class="inline-block bg-gray-600 text-white hover:bg-gray-700 font-bold py-2 px-4 rounded-full transition duration-300">&larr; Kembali ke Daftar UMKM</a>
    </div>

    <div id="productModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-xl w-full mx-auto p-6 relative">
            <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>

            <div class="md:flex">
                <div class="md:w-1/2 flex-shrink-0">
                    <img id="modalProductImage" src="" alt="Product Image" class="w-full h-auto rounded-md mb-4 md:mb-0 object-cover">
                </div>
                <div class="md:w-1/2 md:pl-6">
                    <h2 id="modalProductName" class="text-3xl font-bold text-gray-800 mb-2"></h2>
                    <p class="text-gray-600 mb-4 text-sm"><strong class="text-gray-800">UMKM:</strong> <span id="modalUmkmName"></span></p>
                    <p id="modalProductDescription" class="text-gray-700 mb-4"></p>
                    <p class="text-2xl font-bold text-blue-600 mb-6"><span id="modalProductPrice"></span></p>

                    <a id="whatsappLink" href="#" target="_blank" class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productModal = document.getElementById('productModal');
            const closeModalBtn = document.getElementById('closeModal');
            const modalProductImage = document.getElementById('modalProductImage');
            const modalProductName = document.getElementById('modalProductName');
            const modalUmkmName = document.getElementById('modalUmkmName');
            const modalProductDescription = document.getElementById('modalProductDescription');
            const modalProductPrice = document.getElementById('modalProductPrice');
            const whatsappLink = document.getElementById('whatsappLink');

            // Fungsi untuk menampilkan modal
            function showModal(product) {
                modalProductImage.src = product.gambar ? '/storage/' + product.gambar : 'https://via.placeholder.com/300x200?text=Produk';
                modalProductName.textContent = product.nama_produk;
                modalUmkmName.textContent = product.umkm_name;
                modalProductDescription.textContent = product.deskripsi;
                modalProductPrice.textContent = 'Rp ' + (product.harga ? product.harga.toLocaleString('id-ID') : '0');

                // Buat link WhatsApp
                const waNumber = product.umkm_phone || '6281234567890'; // Default jika tidak ada
                const message = encodeURIComponent(`Halo, saya tertarik dengan produk *${product.nama_produk}* dengan harga *Rp ${product.harga.toLocaleString('id-ID')}*. Apakah produk ini masih tersedia?`);
                whatsappLink.href = `https://wa.me/<span class="math-inline">\{waNumber\}?text\=</span>{message}`;

                productModal.classList.remove('hidden'); // Tampilkan modal
            }

            // Fungsi untuk menyembunyikan modal
            function hideModal() {
                productModal.classList.add('hidden'); // Sembunyikan modal
            }

            // Event listener untuk tombol close modal
            closeModalBtn.addEventListener('click', hideModal);

            // Event listener untuk klik di luar modal (opsional, menutup modal saat klik backdrop)
            productModal.addEventListener('click', function(e) {
                if (e.target === productModal) {
                    hideModal();
                }
            });

            // Event listener untuk setiap produk yang diklik
            document.querySelectorAll('.product-card').forEach(card => {
                card.addEventListener('click', function() {
                    const product = {
                        id: this.dataset.id,
                        nama_produk: this.dataset.nama,
                        deskripsi: this.dataset.deskripsi,
                        harga: parseFloat(this.dataset.harga),
                        gambar: this.dataset.gambar,
                        umkm_id: this.dataset.umkmId,
                        umkm_name: this.dataset.umkmName,
                        umkm_phone: this.dataset.umkmPhone
                    };
                    showModal(product);
                });
            });
        });
    </script>
@endpush