<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalStock = Product::sum('stock') ?? 0;
        $totalCategories = Category::count();
        
        $recentTransactions = ProductTransaction::with(['product', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProducts', 
            'totalStock', 
            'totalCategories', 
            'recentTransactions'
        ));
    }
}