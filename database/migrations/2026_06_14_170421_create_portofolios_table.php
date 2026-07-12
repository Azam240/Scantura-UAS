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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id(); // Sama dengan 'id' PK di ERD
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Hubungan ke tabel User
            $table->string('title');
            $table->text('description');
            $table->string('role_description')->nullable();
            $table->text('challenges')->nullable();
            $table->text('outcomes')->nullable();
            $table->string('category'); // Sesuai kolom category di ERD
            $table->string('status')->default('draft'); // Status portofolio
            $table->float('avg_rating')->default(0.0); // Untuk menampung rating komunitas
            $table->integer('review_count')->default(0);
            $table->boolean('is_verified')->default(false); // Validasi LinkedIn Threshold
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};