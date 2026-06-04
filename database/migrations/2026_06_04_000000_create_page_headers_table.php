<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_headers', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->unique(); // e.g., destinasi, berita, informasi, kontak, galeri, biodiversity, geodiversity, culture-diversity
            $table->string('label')->nullable();   // Label tampilan di admin
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('gambar')->nullable();  // path ke file gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_headers');
    }
};
