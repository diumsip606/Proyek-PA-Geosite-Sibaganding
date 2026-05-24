<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinasi', function (Blueprint $table) { // <--- Pastikan tanpa 's'
            $table->id();
            $table->string('nama', 255);
            $table->string('slug')->unique();
            $table->string('lokasi', 100);
            $table->text('deskripsi');
            $table->longText('gambar_utama')->nullable();
            $table->json('tags')->nullable();

            // Menghubungkan destinasi ke id yang ada di tabel kategoris (dari Langkah 1)
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');

            $table->boolean('status')->default(true);
            $table->timestamps();

            // Hubungan ke tabel admin (pastikan tabel 'admin' sudah ada di database)
            $table->foreignId('admin_id')->nullable()->default(1)->constrained('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinasi');
    }
};
