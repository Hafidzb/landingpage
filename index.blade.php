@extends('layouts.app') {{-- Menambahkan ini agar view ini menggunakan layout 'app' --}}

@section('title', 'Product List')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">
    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter and Search -->
    <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex items-center space-x-4">
            <select id="statusFilter" class="border rounded px-3 py-2 text-gray-700">
                <option value="">All Status</option>
                <option value="promo">Promo</option>
                <option value="new">New</option>
                <option value="normal">Normal</option>
            </select>
            <input type="text" id="searchInput" placeholder="Search products..." class="border rounded px-3 py-2 w-full md:w-64">
        </div>
        {{-- Pastikan route ini sesuai dengan Route::resource('/products', ...) --}}
        <a href="{{ route('products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">+ Add Product</a>
    </div>

    <!-- Product Table -->
    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        Name
                        <button class="ml-1 text-gray-400 hover:text-gray-600" data-sort="name">↕</button>
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        Price
                        <button class="ml-1 text-gray-400 hover:text-gray-600" data-sort="price">↕</button>
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Discount</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
                @forelse($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        {{-- Penting: Pastikan kolom 'name' dan 'price' ada di database Anda --}}
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 rounded text-xs {{ $product->is_promo ? 'bg-green-100 text-green-800' : ($product->is_new ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ $product->is_promo ? 'Promo' : ($product->is_new ? 'New' : 'Normal') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $product->discount ? $product->discount . '%' : '-' }}</td>
                        <td class="px-6 py-4 flex space-x-3">
                            {{-- Pastikan route ini sesuai dengan Route::resource('/products', ...) --}}
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-6">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div style="float: right;"><a href="{{ route('admin.logout') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Logout</a></div>

{{-- JavaScript untuk Sorting dan Filtering bisa diletakkan di section 'scripts' --}}
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const table = document.getElementById('productTable');
    const statusFilter = document.getElementById('statusFilter');
    const searchInput = document.getElementById('searchInput');
    const rows = Array.from(table.getElementsByTagName('tr'));

    // Sorting
    document.querySelectorAll('[data-sort]').forEach(button => {
        button.addEventListener('click', () => {
            const sortBy = button.getAttribute('data-sort');
            const isAscending = button.classList.toggle('ascending');
            rows.sort((a, b) => {
                let aValue = a.children[sortBy === 'name' ? 0 : 1].textContent;
                let bValue = b.children[sortBy === 'name' ? 0 : 1].textContent;
                if (sortBy === 'price') {
                    aValue = parseFloat(aValue.replace(/[^0-9]/g, ''));
                    bValue = parseFloat(bValue.replace(/[^0-9]/g, ''));
                }
                return isAscending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
            });
            // Hapus semua baris dan tambahkan kembali yang sudah diurutkan
            // NOTE: Ini akan menghapus thead juga jika tidak hati-hati. Lebih baik hanya menargetkan tbody.
            // Sebagai perbaikan cepat, kita akan clear tbody dan append kembali rows.
            while (table.firstChild) {
                table.removeChild(table.firstChild);
            }
            rows.forEach(row => table.appendChild(row));
        });
    });

    // Filtering
    const filterTable = () => {
        const status = statusFilter.value;
        const search = searchInput.value.toLowerCase();
        rows.forEach(row => {
            const name = row.children[0].textContent.toLowerCase();
            const statusText = row.children[2].textContent.toLowerCase(); // Ambil dari kolom Status
            const statusMatch = !status || statusText.includes(status);
            const searchMatch = !search || name.includes(search);
            row.style.display = statusMatch && searchMatch ? '' : 'none';
        });
    };

    statusFilter.addEventListener('change', filterTable);
    searchInput.addEventListener('input', filterTable);
});
</script>
@endsection
