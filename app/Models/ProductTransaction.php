<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    protected $guarded = []; 

    // Relasi ke tabel products (Setiap transaksi adalah milik satu produk)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke tabel users (Setiap transaksi dicatat oleh satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}