<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Izinkan semua kolom diisi
    protected $guarded = [];

    // Relasi ke tabel kategori (opsional, tapi baik ditambahkan jika belum ada)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}