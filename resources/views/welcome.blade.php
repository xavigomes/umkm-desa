@extends('app')

@section('content')
    <section class="bg-blue-600 text-white rounded-lg shadow-lg p-8 mb-8 text-center">
        <h1 class="text-5xl font-bold mb-4">Jelajahi Berbagai Usaha Mikro, Kecil, dan Menengah dari Desa Kami!</h1>
        <p class="text-xl mb-6">Temukan produk unik dan dukung ekonomi lokal.</p>
        {{-- <a href="{{ route('umkms.index') }}" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-full text-lg transition duration-300 transform hover:scale-105">Lihat Semua UMKM</a> --}}
    </section>
    
<section class="mb-12">
    <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Produk Unggulan Kami</h2>

    <div class="swiper mySwiper"> {{-- <--- PASTIKAN CLASS 'mySwiper' ADA DI SINI --}}
        <div class="swiper-wrapper"> {{-- <--- DAN INI --}}
            @foreach ($featuredProducts as $produk)
                <div class="swiper-slide"> {{-- <--- DAN INI --}}
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer transform hover:scale-105 transition duration-300 product-card"
                         data-id="{{ $produk->id }}"
                         data-nama="{{ $produk->nama_produk }}"
                         data-deskripsi="{{ $produk->deskripsi }}"
                         data-harga="{{ $produk->harga }}"
                         data-gambar="{{ $produk->gambar }}"
                         data-umkm-id="{{ $produk->umkm->id }}"
                         data-umkm-name="{{ $produk->umkm->nama_umkm }}"
                         data-umkm-phone="{{ $produk->umkm->nomor_telepon }}">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama_produk }}</h3>
                            <p class="text-gray-600 text-sm mb-4">UMKM: {{ $produk->umkm->nama_umkm }}</p>
                            <p class="text-blue-600 text-xl font-bold mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            {{-- Tombol Lihat Detail yang dihapus atau diubah seperti yang kita diskusikan --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="text-center mt-10">
        <a href="{{ route('umkms.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105">
            Lihat Semua Produk & UMKM
        </a>
    </div>
</section>
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
                whatsappLink.href = `https://wa.me/${waNumber}?text=${message}`;

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