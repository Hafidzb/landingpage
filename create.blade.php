@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded mt-8">
    <h2 class="text-xl font-bold mb-4">Tambah Produk Baru</h2>

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="description" class="w-full border rounded px-4 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Harga</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">URL Gambar</label>
            <input type="url" name="image_url" value="{{ old('image_url') }}" class="w-full border rounded px-4 py-2">
        </div>

        <div class="flex space-x-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_promo" class="mr-2"> Promo
            </label>
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_new" class="mr-2"> Produk Baru
            </label>
        </div>

        <div>
            <label class="block font-semibold">Diskon (%)</label>
            <input type="number" name="discount" value="{{ old('discount') }}" class="w-full border rounded px-4 py-2">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Simpan</button>
        </div>
    </form>
</div>
@endsection