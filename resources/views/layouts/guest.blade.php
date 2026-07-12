<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ScanTura - Akses Instrumen</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts & Tailwind -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#030712] text-gray-200 min-h-screen flex flex-col justify-center items-center relative overflow-hidden">
        
        <!-- Efek Ornamen Glow Cahaya Biru di Background (Biar Senada dengan Welcome Page) -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[130px] pointer-events-none"></div>

        <!-- Branding Logo Atas Form -->
        <div class="mb-8 z-10 text-center animate-fade-in">
            <a href="{{ url('/') }}" class="text-3xl font-extrabold tracking-wider text-blue-500">
                ScanTura<span class="text-white">.</span>
            </a>
            <p class="text-xs text-gray-400 mt-2 tracking-widest uppercase font-mono">Sistem Autentikasi Parameter</p>
        </div>

        <!-- Wadah Form dengan Efek Deep Glass & Border Transparan Halus -->
        <div class="w-full sm:max-w-md px-8 py-8 bg-gray-900/40 backdrop-blur-md border border-white/10 shadow-2xl rounded-2xl z-10">
            {{ $slot }}
        </div>
        
        <!-- Footer Kecil Pengaman -->
        <div class="mt-8 z-10">
            <a href="{{ url('/') }}" class="text-xs text-gray-500 hover:text-blue-400 transition font-mono flex items-center gap-1">
                ← Kembali ke Beranda Utama
            </a>
        </div>

    </body>
</html>