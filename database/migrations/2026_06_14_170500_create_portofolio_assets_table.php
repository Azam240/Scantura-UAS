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
        Schema::create('portfolio_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained()->onDelete('cascade'); // Hubungan ke tabel Portfolio
            $table->string('type'); // Misal: 'image', 'thumbnail', 'link'
            $table->string('url');  // Tempat menyimpan path file/link dokumen
            $table->string('label')->nullable();
            $table->boolean('is_primary')->default(false); // Gambar utama cover portofolio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_assets');
    }
};