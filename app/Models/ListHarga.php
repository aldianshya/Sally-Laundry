<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListHarga extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'list_harga';

    // Kolom yang bisa diisi
    protected $fillable = [
        'layanan_laundry_id',
        'nama_layanans',
        'waktu',
        'harga',
    ];

    // Relasi ke tabel layanan_laundry
    public function layananLaundry()
    {
        return $this->belongsTo(LayananLaundry::class, 'layanan_laundry_id');
    }
}
