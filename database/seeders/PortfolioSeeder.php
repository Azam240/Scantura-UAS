<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\PortfolioAsset;
use App\Models\User;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pastikan ada minimal 1 User di database untuk memiliki portofolio ini
        $user = User::first() ?? User::factory()->create([
            'name' => 'Alumni ScanTura',
            'email' => 'alumni@scantura.com',
        ]);

        // 2. Suntik Data Portofolio Pertama (Contoh Web E-Commerce)
        $portfolio1 = Portfolio::create([
            'user_id' => $user->id,
            'title' => 'Sistem Informasi E-Commerce Produk Lokal',
            'description' => 'Membangun platform e-commerce tangguh dengan fitur manajemen inventaris real-time.',
            'role_description' => 'Full-Stack Developer - Merancang database dan integrasi API.',
            'challenges' => 'Sinkronisasi stok barang saat lonjakan traffic tinggi.',
            'outcomes' => 'Sistem berhasil menangani 1000+ transaksi harian tanpa delay.',
            'category' => 'Web Development',
            'status' => 'published',
            'avg_rating' => 4.8,
            'review_count' => 5,
            'is_verified' => true,
            'verified_at' => now(),
            'published_at' => now(),
        ]);

        // Suntik Asset Gambar untuk Portofolio Pertama
        PortfolioAsset::create([
            'portfolio_id' => $portfolio1->id,
            'type' => 'image',
            'url' => 'assets/portfolio/ecommerce-mockup.png',
            'label' => 'Homepage Mockup',
            'is_primary' => true,
        ]);

        // 3. Suntik Data Portofolio Kedua (Contoh Mobile Apps)
        $portfolio2 = Portfolio::create([
            'user_id' => $user->id,
            'title' => 'Aplikasi Monitoring Keamanan Jaringan',
            'description' => 'Aplikasi mobile untuk mendeteksi anomali paket data dan serangan siber pada server lokal.',
            'role_description' => 'Backend Engineer - Fokus pada enkripsi dan hashing algoritma.',
            'challenges' => 'Mengolah log server berukuran besar secara real-time.',
            'outcomes' => 'Berhasil mendeteksi potensi serangan brute force dalam waktu di bawah 3 detik.',
            'category' => 'Mobile Development',
            'status' => 'published',
            'avg_rating' => 4.5,
            'review_count' => 2,
            'is_verified' => false, // Simulasi belum terverifikasi oleh sistem
            'verified_at' => null,
            'published_at' => now(),
        ]);

        // Suntik Asset Gambar untuk Portofolio Kedua
        PortfolioAsset::create([
            'portfolio_id' => $portfolio2->id,
            'type' => 'image',
            'url' => 'assets/portfolio/security-dashboard.png',
            'label' => 'Security Log Dashboard',
            'is_primary' => true,
        ]);
    }
}