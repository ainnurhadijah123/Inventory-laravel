@extends('layouts.app')
@section('title', 'Tambah Produk Baru')

@section('content')
<div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto;">
    <h2 style="margin-top: 0; margin-bottom: 25px; color: #1f2937;">Tambah Produk Baru</h2>

    <!-- Form akan mengirim data ke route products.store menggunakan metode POST -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf <!-- Wajib ada di Laravel untuk keamanan form -->
        
        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">SKU (Kode Barang)</label>
            <input type="text" name="sku" required placeholder="Contoh: BRG-001" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Nama Produk</label>
            <input type="text" name="name" required placeholder="Contoh: Botol Minum 1 Liter" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Kategori</label>
            <select name="category_id" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="display: flex; gap: 15px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Harga (Rp)</label>
                <input type="number" name="price" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Stok Awal</label>
                <input type="number" name="stock" value="0" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Minimal Stok (Alert)</label>
            <input type="number" name="minimum_stock" value="5" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Gambar Produk (Opsional)</label>
            <input type="file" name="image" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; background-color: #f9fafb;">
        </div>

        <div style="display: flex; gap: 15px; margin-top: 15px;">
            <a href="{{ route('products.index') }}" style="flex: 1; text-align: center; background-color: #e5e7eb; color: #374151; padding: 12px; text-decoration: none; border-radius: 6px; font-weight: 600;">Kembali</a>
            <button type="submit" style="flex: 1; background-color: #2563eb; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 600; cursor: pointer;">Simpan Produk</button>
        </div>
    </form>
</div>
@endsection