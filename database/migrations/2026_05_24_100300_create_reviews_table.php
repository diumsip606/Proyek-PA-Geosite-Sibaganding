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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Menghubungkan review ke id yang ada di tabel destinasi
            $table->foreignId('destinasi_id')->constrained('destinasi')->onDelete('cascade');
            
            $table->string('nama');
            $table->text('komentar');
            $table->integer('rating'); // Untuk menyimpan angka rating (misal 1-5)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
