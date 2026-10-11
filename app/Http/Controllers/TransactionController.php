<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil semua produk untuk pilihan dropdown
        $products = Product::orderBy('name')->get();
        return view('transactions.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Cek jika barang keluar, stok tidak boleh minus
        if ($request->type === 'out' && $product->stock < $request->quantity) {
            return back()->with('error', 'Stok fisik tidak mencukupi untuk dikeluarkan!');
        }

        // 1. Simpan riwayat transaksi
        ProductTransaction::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(), // Ambil ID user yang sedang login
            'type' => $request->type,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
        ]);

        // 2. Update stok di tabel produk
        if ($request->type === 'in') {
            $product->increment('stock', $request->quantity);
        } else {
            $product->decrement('stock', $request->quantity);
        }

        return back()->with('success', 'Transaksi barang berhasil diproses!');
    }
}