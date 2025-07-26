<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Charmed Chews')</title>

    <!-- Tailwind CSS CDN - Pastikan koneksi internet aktif saat pengembangan -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Optional: Mengatur font Inter */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <!-- Untuk font Inter, Anda mungkin perlu menambahkannya dari Google Fonts jika tidak menggunakan CDN Tailwind penuh -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="min-h-screen">
        {{-- Anda bisa menambahkan navigasi, header, atau footer di sini --}}

        <main class="py-4">
            @yield('content') {{-- Ini adalah tempat konten dari view individu akan disuntikkan --}}
        </main>

        {{-- Anda bisa menambahkan footer di sini --}}
    </div>

    @yield('scripts') {{-- Tempat untuk JavaScript tambahan dari view individu --}}
</body>
</html>
