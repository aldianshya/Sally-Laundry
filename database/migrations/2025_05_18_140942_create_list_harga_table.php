

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('list_harga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_laundry_id')->constrained('layanan_laundry')->onDelete('cascade');
            $table->string('nama_layanans')->nullable();
            $table->string('waktu')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_harga');
    }
};