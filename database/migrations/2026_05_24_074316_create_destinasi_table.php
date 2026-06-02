<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('slug')->unique();
            $table->string('lokasi', 100)->nullable();
            $table->text('deskripsi');
            $table->longText('gambar_utama')->nullable();
            $table->json('tags')->nullable();
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->default(1)->constrained('users');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinasi');
    }
};