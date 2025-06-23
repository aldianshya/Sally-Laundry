<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilUsaha extends Model
{
    use HasFactory;

    protected $table = 'profil_usaha';

    // Jika tidak pakai kolom primary key 'id', bisa definisikan manual:
    // protected $primaryKey = 'id';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_usaha',
        'judul_slogan',
        'subjudul_slogan',
        'deskripsi_profil',
        'catatan_tambahan',
        'gambar_profil',
        'gambar_ilustrasi',
    ];
}
