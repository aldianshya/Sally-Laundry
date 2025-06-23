<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranksaksi extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari default (jamak model)
    protected $table = 'tranksaksi';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
    'id_user',
    'id_list_harga',
    'id_pelanggan',
    'tanggal_masuk',
    'estimasi_selesai',
    'berat',
    'total_harga',
    'dicuci',
    'diproses',
    'disetrika',
    'dikemas',
    'selesai',
    'struck', // ✅ tambahkan ini
];


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke ListHarga
    public function listHarga()
    {
        return $this->belongsTo(ListHarga::class, 'id_list_harga');
    }

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
