@extends('layouts.app')

@section('content')
<div class="container container-narrow">

    <header class="page-header">
        <h1>Edit Produk</h1>
        <a class="btn btn-ghost" href="{{ route('products.index') }}">&larr; Kembali</a>
    </header>

    @if ($errors->any())
        <div class="alert alert-error">
            Periksa lagi input Anda, terjadi kesalahan pada form ini.
        </div>
    @endif

    <!-- WAJIB DITAMBAHKAN: enctype="multipart/form-data" -->
    <form class="form-card" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')

        <label for="sku">SKU Produk</label>
        <input id="sku" name="sku" minlength="3" required value="{{ old('sku', $product->sku) }}">
        @error('sku')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <label for="name">Nama produk</label>
        <input id="name" name="name" minlength="3" required value="{{ old('name', $product->name) }}">
        @error('name')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" style="width: 100%; padding: 8px; margin-bottom: 15px;">
            <option value="">Pilih Kategori...</option>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <label for="price">Harga</label>
        <input id="price" name="price" type="number" min="1" step="0.01" required value="{{ old('price', $product->price) }}">
        @error('price')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <label for="stock">Stok</label>
        <input id="stock" name="stock" type="number" min="0" required value="{{ old('stock', $product->stock) }}">
        @error('stock')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <label for="minimum_stock">Minimal Stok</label>
        <input id="minimum_stock" name="minimum_stock" type="number" min="0" required value="{{ old('minimum_stock', $product->minimum_stock) }}">
        @error('minimum_stock')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <!-- TAMBAHAN: Kolom Gambar Produk -->
        <label for="image">Gambar Produk</label>
        
        @if ($product->image)
            <div style="margin-bottom: 15px;">
                <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk" style="max-width: 150px; border-radius: 8px; border: 1px solid #e5e7eb;">
            </div>
        @endif

        <input id="image" name="image" type="file" accept="image/jpeg, image/png, image/jpg" style="padding: 10px 0;">
        <p style="font-size: 12px; color: #9ca3af; margin-top: -5px;">*Biarkan kosong jika tidak ingin mengubah gambar. Maksimal 2MB.</p>
        
        @error('image')
            <p class="field-error" style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Simpan perubahan Anda</button>
    </form>

</div>
@endsection