<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    // Nama tabel yang terhubung dengan model ini (opsional jika nama model sama dengan singular tabel)
    protected $table = 'umkms';

    // Kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'nama_umkm',
        'deskripsi',
        'alamat',
        'kontak_telepon',
        'kontak_email',
        'link_media_sosial',
        'logo',
    ];

    /**
     * Get the products for the UMKM.
     */
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}