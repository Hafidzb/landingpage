@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow p-6 rounded">
            <h2 class="text-lg font-semibold text-indigo-600 mb-2">Total Produk</h2>
            <p class="text-3xl">{{ $productCount }}</p>
        </div>
        <div class="bg-white shadow p-6 rounded">
            <h2 class="text-lg font-semibold text-green-600 mb-2">Promo Aktif</h2>
            <p class="text-3xl">{{ $promoCount }}</p>
        </div>
        <div class="bg-white shadow p-6 rounded">
            <h2 class="text-lg font-semibold text-red-600 mb-2">Laporan Masuk</h2>
            <p class="text-3xl">{{ $reportCount }}</p>
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Produk Terbaru</h2>
        <table class="min-w-full bg-white shadow rounded table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2">Nama</th>
                    <th class="text-left px-4 py-2">Harga</th>
                    <th class="text-left px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentProducts as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $product->is_promo ? 'Promo' : 'Normal' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection