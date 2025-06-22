<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'umkm_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'gambar',
    ];

    /**
     * Get the UMKM that owns the product.
     */
    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}