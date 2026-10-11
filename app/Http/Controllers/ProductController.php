<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Ambil data produk, jika ada pencarian maka filter berdasarkan nama
        $products = Product::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('products.index', compact('products', 'search'));
    }

    public function create()
    {
        // Ambil data kategori dari database untuk ditampilkan di pilihan Dropdown
        $categories = \App\Models\Category::all();
        
        // Tampilkan halaman form tambah produk dan kirim data kategori
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // 1. Validasi data yang diketik user
        $request->validate([
            'sku' => 'required|unique:products,sku',
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // 2. Jika user mengunggah gambar, simpan file-nya ke folder 'public/products'
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // 3. Simpan seluruh data ke database
        \App\Models\Product::create($data);

        // 4. Kembalikan user ke halaman daftar produk
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        try {
            $product = \App\Models\Product::findOrFail($id);
            
            // Hapus riwayat transaksi terkait produk ini agar tidak error relasi database
            \App\Models\ProductTransaction::where('product_id', $product->id)->delete();
            
            // Hapus produknya
            $product->delete();

            return redirect()->route('products.index')->with('success', 'Barang beserta riwayat transaksinya berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Gagal menghapus barang: ' . $e->getMessage());
        }
    }
}