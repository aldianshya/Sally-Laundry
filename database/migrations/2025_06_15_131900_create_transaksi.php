<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tranksaksi', function (Blueprint $table) {
            $table->id(); // bigint auto_increment

            // Foreign key ke tabel users (OK)
            $table->foreignId('id_user')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Foreign key ke tabel list_harga (perhatikan ini bukan bentuk jamak)
            $table->foreignId('id_list_harga')
                  ->constrained('list_harga') // pastikan nama tabel tepat
                  ->onDelete('cascade');

            // Foreign key ke tabel pelanggans (OK)
            $table->foreignId('id_pelanggan')
                  ->constrained('pelanggan')
                  ->onDelete('cascade');

            $table->date('tanggal_masuk');
            $table->date('estimasi_selesai');
            $table->integer('berat')->nullable();
            $table->integer('total_harga');
            $table->bigInteger('struck')->nullable();

            $table->tinyInteger('dicuci')->default(0);
            $table->tinyInteger('diproses')->default(0);
            $table->tinyInteger('disetrika')->default(0);
            $table->tinyInteger('dikemas')->default(0);
            $table->tinyInteger('selesai')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tranksaksi');
    }
};
