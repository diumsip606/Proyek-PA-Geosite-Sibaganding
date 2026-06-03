<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontak_info', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); // alamat, telepon, email, sosial_media, jam_operasional
            $table->string('label')->nullable(); // contoh: "Pak Andi", "Facebook", "Senin - Jumat"
            $table->string('nilai'); // isi utama: nomor telepon, URL, jam, dll
            $table->string('icon')->nullable(); // class Font Awesome, contoh: "fab fa-instagram"
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak_info');
    }
};
