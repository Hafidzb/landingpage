<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $promoCount = Product::where('is_promo', true)->count();
        $reportCount = 0; // Ganti sesuai model laporan

        $recentProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact('productCount', 'promoCount', 'reportCount', 'recentProducts'));
    }
}
