<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_usaha', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha'); // Sally Laundry
            $table->string('judul_slogan'); // Laundry Praktis, Usaha Otomatis!
            $table->string('subjudul_slogan'); // Solusi Laundry Hemat dan Ekonomis
            $table->text('deskripsi_profil'); // teks panjang deskripsi
            $table->text('catatan_tambahan')->nullable(); // Laundry Bersih, Wangi, dan Tepat Waktu!

            // Menyimpan path/nama file gambar
            $table->string('gambar_profil')->nullable(); // contoh: profil_usaha/depan.jpg
            $table->string('gambar_ilustrasi')->nullable(); // contoh: profil_usaha/banner.png

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_usaha');
    }
};
