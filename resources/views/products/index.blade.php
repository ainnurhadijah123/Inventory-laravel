@extends('layouts.app')
@section('title', 'Daftar Produk')

@section('content')
<div style="background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0; color: #1f2937; font-size: 28px;">Product Manager</h1>
        <a href="{{ route('products.create') }}" style="background-color: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px;">+ Tambah Produk</a>
    </div>

    <form action="{{ route('products.index') }}" method="GET" style="display: flex; gap: 10px; margin-bottom: 25px;">
        <input type="text" name="search" placeholder="Cari nama atau kategori..." value="{{ $search ?? '' }}" style="flex: 1; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        <button type="submit" style="background-color: #e5e7eb; color: #374151; border: none; padding: 0 20px; border-radius: 6px; font-weight: 600; cursor: pointer;">Cari</button>
        <a href="{{ route('products.index') }}" style="background-color: transparent; color: #2563eb; padding: 12px; text-decoration: none; font-weight: 600; font-size: 14px; display: flex; align-items: center;">↻ Refresh</a>
    </form>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px;">
        @forelse($products as $product)
            <div style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 15px; text-align: left; position: relative;">
                <div style="background-color: #f3f4f6; height: 200px; border-radius: 8px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    @else
                        <span style="color: #9ca3af;">(Tanpa Gambar)</span>
                    @endif
                </div>
                <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #1f2937;">{{ $product->name }}</h3>
                <p style="margin: 0 0 10px 0; font-size: 13px; color: #6b7280;">{{ $product->category->name ?? 'Tanpa Kategori' }}</p>
                <p style="margin: 0 0 10px 0; font-size: 18px; font-weight: bold; color: #000;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                
                @if($product->stock <= 0)
                    <div style="background-color: #fee2e2; color: #b91c1c; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; display: inline-block; margin-bottom: 15px;">Stok Habis</div>
                @else
                    <div style="color: #6b7280; font-size: 13px; margin-bottom: 15px;">Stok: {{ $product->stock }}</div>
                @endif
                
                <div style="margin-top: 10px; display: flex; align-items: center;">
                    <!-- Tombol Edit (Semua user bisa lihat) -->
                    <a href="{{ route('products.edit', $product->id) }}" style="background-color: #e5e7eb; color: #374151; padding: 6px 15px; text-decoration: none; border-radius: 4px; font-weight: 600; font-size: 13px;">Edit</a>
                    
                    <!-- Tombol Hapus (Hanya muncul jika user yang login bernama 'admin') -->
                    @if(auth()->user()->name === 'admin')
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 13px; font-weight: 600; margin-left: 5px;">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #6b7280;">
                Belum ada data produk. Silakan tambahkan produk baru.
            </div>
        @endforelse
    </div>
</div>
@endsection