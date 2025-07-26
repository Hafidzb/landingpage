@extends('layouts.app')

@section('content')
<div class="w-full max-w-sm p-6 bg-white rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Admin Login</h2>
    <form method="POST" action="{{ url('/admin/login') }}" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Admin</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                required 
                placeholder="you@example.com"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password"
                required 
                placeholder="••••••••"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div>
            <button 
                type="submit" 
                class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
            >
                Login
            </button>
        </div>
    </form>
</div>
@endsection
