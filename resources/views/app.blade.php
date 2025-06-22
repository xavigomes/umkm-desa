<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemasaran UMKM Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <header class="bg-white shadow py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">UMKM Desa Dangiang</a>
            <nav>
                <ul class="flex items-center">
                    <li><a href="{{ route('home') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900">Beranda</a></li>
                    <li><a href="{{ route('desa.profile') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900">Profil Desa</a></li>
                    <li><a href="{{ route('umkms.index') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900">Daftar UMKM</a></li>
                    <li><a href="{{ route('contact') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900">Kontak</a></li> {{-- <--- UBAH INI! --}}
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-8 px-6 py-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} UMKM Desa Dangiang. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> {{-- <--- PASTIKAN BARIS INI ADA! --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Swiper untuk produk unggulan
            if (document.querySelector('.mySwiper')) { // Ini adalah wrapper Swiper
                new Swiper('.mySwiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 24,
                        },
                    },
                });
            } else {
                console.log("Swiper wrapper (.mySwiper) not found."); // Debugging: jika elemen tidak ditemukan
            }
        });
    </script>    @stack('scripts') {{-- <--- PASTIKAN BARIS INI ADA! --}}
</body>
</html>