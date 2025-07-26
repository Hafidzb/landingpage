@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="bg-white shadow p-4 flex justify-between items-center">
    <div class="text-xl font-bold text-indigo-600">Charmed Chews</div>
    <div>
        <a href="{{ route('admin.login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Admin Panel</a>
    </div>
</nav>

<!-- Hero Section (Optional) -->
<div class="bg-indigo-100 py-12 text-center">
    <h1 class="text-3xl font-bold text-gray-800">Welcome to Charmed Chews</h1>
    <p class="text-gray-600 mt-2">Big Promo & New Product Just For You</p>
</div>

<!-- Produk Promo/Diskon -->
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Promo & New Products</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white shadow rounded p-4">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-indigo-600 font-bold mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-100 py-6 mt-12">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-700">
        <div>
            <h4 class="font-semibold mb-2">About Us</h4>
            <ul>
                <li><a href="#" class="hover:underline">FAQ</a></li>
                <li><a href="#" class="hover:underline">Contact</a></li>
                <li><a href="#" class="hover:underline">Marketplace</a></li>
            </ul>
        </div>
        <div class="md:col-span-2 text-right">
            &copy; {{ date('Y') }} Charmed Chews. All rights reserved.
        </div>
    </div>
</footer>
@endsection