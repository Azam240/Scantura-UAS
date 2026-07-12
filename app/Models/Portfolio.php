<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara spesifik sesuai di database
    protected $table = 'portfolios';

    // Kolom yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'role_description',
        'challenges',
        'outcomes',
        'category',
        'status',
        'avg_rating',
        'review_count',
        'is_verified',
        'verified_at',
        'published_at'
    ];

    /**
     * Relasi: Satu Portofolio dimiliki oleh satu User (Many-to-One)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi: Satu Portofolio bisa memiliki banyak Asset Gambar/File (One-to-Many)
     */
    public function assets()
    {
        return $this->hasMany(PortfolioAsset::class, 'portfolio_id');
    }
}