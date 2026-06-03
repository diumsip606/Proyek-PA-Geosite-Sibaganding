<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->nullable()->unique();
            $table->longText('konten')->nullable();
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('penulis')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('views')->default(0);
            $table->integer('komentar')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};