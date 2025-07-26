<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil produk promo, diskon, atau produk terbaru (sesuaikan logikanya)
        $products = Product::where('is_promo', true)
                    ->orWhere('discount', '>', 0)
                    ->orWhere('is_new', true)
                    ->latest()
                    ->take(6)
                    ->get();

        return view('landing', compact('products'));
    }
}
