<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Pastikan model Product sudah diimport

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        $products = Product::latest()->get();
        // Pastikan 'index' sesuai dengan lokasi file Blade Anda
        return view('admin.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        // ASUMSI: File create.blade.php ada di resources/views/create.blade.php
        return view('create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255', // Tambah validasi string dan max length
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0', // Pastikan harga tidak negatif
            'image_url' => 'nullable|url', // Tambah max length
            'is_promo' => 'nullable',
            'is_new' => 'nullable',
            'discount' => 'nullable|numeric|min:0|max:100', // Pastikan diskon antara 0-100
        ]);

        // Tangani checkbox yang mungkin tidak tercentang
        $data['is_promo'] = $request->has('is_promo');
        $data['is_new'] = $request->has('is_new');
        
        Product::create($data);

        // Mengarahkan ke route 'products.index' setelah berhasil menyimpan
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Product $product)
    {
        // ASUMSI: File edit.blade.php ada di resources/views/admin/edit.blade.php
        return view('edit', compact('product'));
    }

    /**
     * Memperbarui produk yang sudah ada di database.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url|max:2048',
            'is_promo' => 'nullable',
            'is_new' => 'nullable',
            // Perbaiki: 'discount' menjadi 'nullable|numeric' agar konsisten dengan database
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        // Tangani checkbox yang mungkin tidak tercentang
        $data['is_promo'] = $request->has('is_promo');
        $data['is_new'] = $request->has('is_new');

        $product->update($data);

        // Mengarahkan ke route 'products.index' setelah berhasil memperbarui
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // Mengarahkan ke route 'products.index' setelah berhasil menghapus
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}