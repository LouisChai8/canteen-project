<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMAT - Kantin Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8f6f6] text-slate-800 font-sans flex flex-col min-h-screen">

    <!-- Top Navbar Header -->
    <header
        class="bg-gradient-to-r from-[#56021F] via-[#59142b] to-[#D17D98] text-white px-8 py-3 flex items-center justify-between sticky top-0 z-50 shadow-md">
        <a href="{{ route('catalog') }}" class="text-xl font-bold tracking-wider">SEMAT</a>

        <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ route('catalog') }}" class="hover:text-pink-200 transition">Katalog</a>
            <a href="{{ route('orders') }}" class="hover:text-pink-200 transition">Pesanan Saya</a>
            <a href="{{ route('checkout') }}" class="hover:text-pink-200 transition">Pembayaran</a>
            <a href="#" class="hover:text-pink-200 transition">History</a>
        </nav>

        <div class="flex items-center gap-3">
            <a href="{{ route('checkout') }}"
                class="bg-white text-[#59142b] hover:bg-slate-100 font-semibold text-xs px-4 py-2 rounded-full shadow transition">
                Buat Pesanan
            </a>
            <a href="{{ route('checkout') }}"
                class="bg-[#3e0d1d]/60 hover:bg-[#3e0d1d] p-2 rounded-lg text-white transition relative">
                🛒
            </a>
            <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-white/50">
                <img src="{{ asset('images/Profile.png') }}" alt="Profile" class="w-full h-full object-cover">
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#7d3248] text-white px-8 py-4 mt-auto flex justify-between items-center text-xs">
        <span class="font-bold tracking-wider text-sm">SEMAT</span>
        <span class="opacity-80">©2026 SEMAT Kelompok 4</span>
    </footer>

</body>

</html>