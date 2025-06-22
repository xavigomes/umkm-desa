<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Umkm;   // Import model Umkm
use App\Models\Produk; // Import model Produk

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil UMKM yang sudah dibuat untuk mengaitkan produk
        $umkm1 = Umkm::where('nama_umkm', 'Kerupuk Babangi')->first();
        $umkm2 = Umkm::where('nama_umkm', 'Kopi Mang Adul')->first();
        $umkm3 = Umkm::where('nama_umkm', 'dapur Bi Ulfah')->first();
        $umkm4 = Umkm::where('nama_umkm', 'Seblak Teh Anggi')->first();

        if ($umkm1) {
            Produk::create([
                'umkm_id' => $umkm1->id,
                'nama_produk' => 'Kerupuk Babangi Lada',
                'deskripsi' => 'Kerupuk babangi dengan cita rasa pedas, cocok untuk camilan di acara-acara besar.',
                'harga' => 500,
                'gambar' => "produk_babangi_lada.png",
            ]);
            Produk::create([
                'umkm_id' => $umkm1->id,
                'nama_produk' => 'Kerupuk Babangi Original',
                'deskripsi' => 'Kerupuk babangi dengan cita rasa original, tapi tetap enak meskipun original.',
                'harga' => 500,
                'gambar' => "produk_babangi_original.png",
            ]);
        }

        if ($umkm2) {
            Produk::create([
                'umkm_id' => $umkm2->id,
                'nama_produk' => 'Kopi Arabika',
                'deskripsi' => 'Dipetik dari pegunungan Cikuray, membuat cita rasa otentik.',
                'harga' => 35000,
                'gambar' => "produk_kopi_arabika.png",                
            ]);
        }
        if ($umkm3) {
            Produk::create([
                'umkm_id' => $umkm3->id,
                'nama_produk' => 'Bolu Ulang Tahun',
                'deskripsi' => 'Bolu ulang tahun dengan desain yang menarik dan bisa sesuai keinginan pelanggan.',
                'harga' => 35000,
                'gambar' => "produk_ultah.png",
            ]);
            Produk::create([
                'umkm_id' => $umkm3->id,
                'nama_produk' => 'Tahu Balut',
                'deskripsi' => 'Tahu balut dengan berbagai rasa, dibaluti dengan tepung terigu pilihan, menjadikan produk berbeda dengan yang lain',
                'harga' => 5000,
                'gambar' => "produk_tahu_balut.png",
            ]);
            Produk::create([
                'umkm_id' => $umkm3->id,
                'nama_produk' => 'Bacil',
                'deskripsi' => 'Bacil yang biasa di jual menggunakan gerobak, namun bacil ini berbeda, diberi tambahan bumbu yang dapat membuat Anda tidak ingin berhenti memakannya.',
                'harga' => 5000,
                'gambar' => "produk_bacil.png",
            ]);
        }
        if ($umkm4) {
            Produk::create([
                'umkm_id' => $umkm4->id,
                'nama_produk' => 'Juice Urat',
                'deskripsi' => 'Sama dengan baso jus juga punya varian rasa urat.',
                'harga' => 25000,
                'gambar' => "jus_urat.jpg",
            ]);
            Produk::create([
                'umkm_id' => $umkm4->id,
                'nama_produk' => 'Seblak Setan',
                'deskripsi' => 'Seblak dengan cita rasa pedas, namun membuat ketagihan karena ada bumbu spesial ditiap seblak yang disajikan.',
                'harga' => 25000,
                'gambar' => "produk_seblak_setan.png",
            ]);
            Produk::create([
                'umkm_id' => $umkm4->id,
                'nama_produk' => 'Baso Anggi Cihuy',
                'deskripsi' => 'Baso berbeda dengan yang lain, dapat ditambahkan toping lainnya, untuk membuat kenyang di setiap porsi yang disajikan.',
                'harga' => 25000,
                'gambar' => "produk_baso_anggi_cihuy.png",
            ]);
        }
    }
}