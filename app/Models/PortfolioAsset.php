<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioAsset extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara spesifik sesuai di database
    protected $table = 'portfolio_assets';

    // Kolom yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'portfolio_id',
        'type',
        'url',
        'label',
        'is_primary'
    ];

    // Konversi tipe data otomatis dari database (Casting)
    protected $casts = [
        'is_primary' => 'boolean',
    ];

    /**
     * Relasi: Asset ini menginduk ke satu Portofolio (Many-to-One)
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}