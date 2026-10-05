<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'layanan_id',
        'berat',
        'harga_per_kg',
        'total_harga',
        'status',
        'tanggal_masuk',
        'tanggal_selesai',
    ];

    protected $casts = [
        'berat' => 'decimal:2',
        'harga_per_kg' => 'decimal:2',
        'total_harga' => 'decimal:2',
        'tanggal_masuk' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}