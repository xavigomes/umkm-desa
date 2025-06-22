<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Umkm; // Import model Umkm

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Umkm::create([
            'nama_umkm' => 'Kerupuk Babangi',
            'deskripsi' => 'Menyediakan kerupuk babangi dengan berbagai rasa.',
            'alamat' => 'Kampung Negla RT/RW 02/06 Desa Dangiang',
            'kontak_telepon' => '081234567890',
            'kontak_email' => 'ib.titin@example.com',
            'link_media_sosial' => 'https://instagram.com/anyaman_ibu_titin',
            'logo' => "logo_kerupuk_babangi.png", // Belum ada gambar logo
            'nomor_telepon' => '+6285864850582'
        ]);

        Umkm::create([
            'nama_umkm' => 'Kopi Mang Adul',
            'deskripsi' => 'Produsen kopi arabika asli dari pegunungan desa, diproses secara tradisional.',
            'alamat' => 'Kampung Ciharus RT/RW 04/08 Desa Dangiang',
            'kontak_telepon' => '087654321098',
            'kontak_email' => 'kopi.sejati@example.com',
            'link_media_sosial' => null,
            'logo' => "logo_kopi_mang_adul.png",
            'nomor_telepon' => '+6285930429161'            
        ]);

        Umkm::create([
            'nama_umkm' => 'Dapur Bi Ulfah',
            'deskripsi' => 'Aneka makanan mulai dari bolu, tahu balut, basreng dan lain-lain.',
            'alamat' => 'Kampung Ciharus RT/Rw 02/08 Desa Dangiang',
            'kontak_telepon' => '085512345678',
            'kontak_email' => null,
            'link_media_sosial' => null,
            'logo' => "logo_dapur_bi_ulfah.png",
            'nomor_telepon' => '+6285315488590'
        ]);

        Umkm::create([
            'nama_umkm' => 'Seblak Teh Anggi',
            'deskripsi' => 'Menyediakan seblak dengan tema parasmanan',
            'alamat' => 'Kampung Ciharus RT/RW 03/06 Desa Dangiang',
            'kontak_telepon' => '085512345678',
            'kontak_email' => null,
            'link_media_sosial' => null,
            'logo' => "logo_seblak_teh_anggi.png",
            'nomor_telepon' => '+628600826605'
        ]);
    }
}