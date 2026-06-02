<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fakta_uniks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('tag')->nullable();
            $table->double('x_koordinat')->default(50.0);
            $table->double('y_koordinat')->default(50.0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fakta_uniks');
    }
};
