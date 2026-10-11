@extends('layouts.app')
@section('title', 'Transaksi Barang')

@section('content')
<div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto;">
    <h2 style="margin-top: 0; margin-bottom: 25px; color: #1f2937; text-align: center;">Form Transaksi Barang</h2>

    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf
        
        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Pilih Produk</label>
            <select name="product_id" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (Stok: {{ $product->stock }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Jenis Transaksi</label>
            <select name="type" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                <option value="in">Barang Masuk (Tambah Stok)</option>
                <option value="out">Barang Keluar (Kurangi Stok)</option>
            </select>
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Jumlah (Qty)</label>
            <input type="number" name="quantity" min="1" required placeholder="Contoh: 10" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Catatan (Opsional)</label>
            <textarea name="notes" rows="3" placeholder="Misal: Retur dari supplier, Penjualan kasir..." style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;"></textarea>
        </div>

        <button type="submit" style="background-color: #2563eb; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-top: 10px;">Proses Transaksi</button>
    </form>
</div>
@endsection