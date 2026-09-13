<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual - SEMAT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js untuk handle modal pop-up -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-data="{ showModal: false }"
    class="bg-[#f8f6f7] font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Header Navbar -->
    <header class="bg-[#59142b] text-white px-8 py-4 flex items-center justify-between shadow-md relative">
        <div class="text-xl font-black tracking-wider z-10">SEMAT</div>

        <nav
            class="absolute inset-0 flex items-center justify-center space-x-8 text-xs font-semibold pointer-events-none">
            <a href="{{ route('admin.dashboard') }}"
                class="text-white border-b-2 border-white pb-1 pointer-events-auto">Dashboard</a>
            <a href="#" @click.prevent="showModal = true"
                class="text-white/80 hover:text-white transition pointer-events-auto">Pesanan</a>
        </nav>

        <div class="flex items-center space-x-4 z-10">
            <button
                class="bg-white text-[#59142b] text-xs font-bold px-4 py-2 rounded-xl shadow hover:bg-slate-100 transition">
                Buat Pesanan
            </button>
            <button class="relative p-2 bg-[#4a1024] rounded-full text-white hover:bg-[#3d0d1d] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>

            <div class="w-9 h-9 rounded-full border-2 border-white/80 overflow-hidden shadow-sm">
                <img src="{{ asset('images/profile2.png') }}" alt="Profile Admin" class="w-full h-full object-cover">
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto w-full px-6 py-8 space-y-6 flex-grow">
        <h1 class="text-2xl font-black text-slate-900">Dashboard Penjual</h1>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
                class="bg-gradient-to-r from-rose-100/60 to-rose-50/40 p-5 rounded-2xl border border-rose-100/80 flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-[#59142b] text-white rounded-xl flex items-center justify-center font-bold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500">Total Pesanan Hari Ini</p>
                    <h3 class="text-2xl font-black text-slate-900">28</h3>
                    <p class="text-[11px] font-bold text-emerald-600 mt-0.5">↑ 12% <span
                            class="font-normal text-slate-400">dari kemarin</span></p>
                </div>
            </div>

            <div
                class="bg-gradient-to-r from-rose-100/60 to-rose-50/40 p-5 rounded-2xl border border-rose-100/80 flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-[#59142b] text-white rounded-xl flex items-center justify-center font-bold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500">Total Pendapatan Hari Ini</p>
                    <h3 class="text-2xl font-black text-slate-900">Rp728.000</h3>
                    <p class="text-[11px] font-bold text-emerald-600 mt-0.5">↑ 18% <span
                            class="font-normal text-slate-400">dari kemarin</span></p>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-rose-50 text-[#59142b] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h2 class="text-base font-extrabold text-slate-900">Penjualan Hari Ini</h2>
                </div>

                <select
                    class="bg-rose-50/60 border border-rose-100 text-slate-700 text-xs font-bold px-3 py-1.5 rounded-xl focus:outline-none cursor-pointer">
                    <option value="today">Hari ini</option>
                    <option value="7days" selected>7 Hari Terakhir</option>
                    <option value="1month">1 Bulan Terakhir</option>
                </select>
            </div>

            <div class="h-64 relative w-full">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Table Pesanan Terbaru -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-rose-50 text-[#59142b] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h2 class="text-base font-extrabold text-slate-900">Pesanan Terbaru</h2>
                </div>

                <!-- Trigger Pop-up Modal -->
                <button @click="showModal = true"
                    class="text-xs font-bold text-[#59142b] hover:underline flex items-center gap-1 cursor-pointer">
                    Lihat Semua &rarr;
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-y-2">
                    <thead>
                        <tr class="bg-rose-100/50 text-[11px] font-extrabold text-slate-700">
                            <th class="py-3 px-4 rounded-l-xl">No. Pesanan</th>
                            <th class="py-3 px-4">Nama Siswa</th>
                            <th class="py-3 px-4">Kelas</th>
                            <th class="py-3 px-4">Menu</th>
                            <th class="py-3 px-4 text-center">Jumlah</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-right rounded-r-xl">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs font-semibold text-slate-700">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-bold text-slate-900">#028</td>
                            <td class="py-3 px-4">Angelina Putri</td>
                            <td class="py-3 px-4 text-slate-500">10 AKL</td>
                            <td class="py-3 px-4">Nasi Ayam Geprek</td>
                            <td class="py-3 px-4 text-center">2</td>
                            <td class="py-3 px-4 text-center"><x-badge status="Diproses" /></td>
                            <td class="py-3 px-4 text-right text-slate-400">09:12</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-bold text-slate-900">#027</td>
                            <td class="py-3 px-4">Rafael Wijaya</td>
                            <td class="py-3 px-4 text-slate-500">10 TKJ</td>
                            <td class="py-3 px-4">Es Thai Tea</td>
                            <td class="py-3 px-4 text-center">1</td>
                            <td class="py-3 px-4 text-center"><x-badge status="Siap" /></td>
                            <td class="py-3 px-4 text-right text-slate-400">10:21</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-bold text-slate-900">#026</td>
                            <td class="py-3 px-4">Celine Hartono</td>
                            <td class="py-3 px-4 text-slate-500">10 BID</td>
                            <td class="py-3 px-4">Mie Goreng</td>
                            <td class="py-3 px-4 text-center">1</td>
                            <td class="py-3 px-4 text-center"><x-badge status="Diproses" /></td>
                            <td class="py-3 px-4 text-right text-slate-400">10:18</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-bold text-slate-900">#025</td>
                            <td class="py-3 px-4">Kevin Susanto</td>
                            <td class="py-3 px-4 text-slate-500">11 AKL</td>
                            <td class="py-3 px-4">Dimsum</td>
                            <td class="py-3 px-4 text-center">2</td>
                            <td class="py-3 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3 px-4 text-right text-slate-400">10:12</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-bold text-slate-900">#024</td>
                            <td class="py-3 px-4">Natalie Chen</td>
                            <td class="py-3 px-4 text-slate-500">11 TKJ</td>
                            <td class="py-3 px-4">Kentang Goreng</td>
                            <td class="py-3 px-4 text-center">1</td>
                            <td class="py-3 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3 px-4 text-right text-slate-400">10:08</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- POP-UP MODAL FULL PESANAN -->
    <div x-show="showModal" x-transition.opacity
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
        style="display: none;">
        <div @click.away="showModal = false"
            class="bg-white rounded-3xl max-w-4xl w-full max-h-[85vh] flex flex-col shadow-2xl border border-slate-100 overflow-hidden">
            <!-- Modal Header -->
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-rose-50/40 shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-[#59142b] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Semua Daftar Pesanan</h2>
                        <p class="text-xs text-slate-500">Total 28 pesanan terdata hari ini</p>
                    </div>
                </div>
                <button @click="showModal = false"
                    class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 hover:bg-rose-100 hover:text-rose-600 flex items-center justify-center font-bold text-sm transition">
                    ✕
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto flex-grow relative">
                <table class="w-full text-left border-collapse">
                    <thead class="sticky top-0 bg-white z-10 shadow-sm">
                        <tr class="bg-rose-100/70 text-[11px] font-extrabold text-slate-700">
                            <th class="py-3 px-4 rounded-l-xl">No. Pesanan</th>
                            <th class="py-3 px-4">Nama Siswa</th>
                            <th class="py-3 px-4">Kelas</th>
                            <th class="py-3 px-4">Menu</th>
                            <th class="py-3 px-4 text-center">Jumlah</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-right rounded-r-xl">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs font-semibold text-slate-700 divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#028</td>
                            <td class="py-3.5 px-4">Angelina Putri</td>
                            <td class="py-3.5 px-4 text-slate-500">10 AKL</td>
                            <td class="py-3.5 px-4">Nasi Ayam Geprek</td>
                            <td class="py-3.5 px-4 text-center">2</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Diproses" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">09:12</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#027</td>
                            <td class="py-3.5 px-4">Rafael Wijaya</td>
                            <td class="py-3.5 px-4 text-slate-500">10 TKJ</td>
                            <td class="py-3.5 px-4">Es Thai Tea</td>
                            <td class="py-3.5 px-4 text-center">1</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Siap" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">10:21</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#026</td>
                            <td class="py-3.5 px-4">Celine Hartono</td>
                            <td class="py-3.5 px-4 text-slate-500">10 BID</td>
                            <td class="py-3.5 px-4">Mie Goreng</td>
                            <td class="py-3.5 px-4 text-center">1</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Diproses" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">10:18</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#025</td>
                            <td class="py-3.5 px-4">Kevin Susanto</td>
                            <td class="py-3.5 px-4 text-slate-500">11 AKL</td>
                            <td class="py-3.5 px-4">Dimsum</td>
                            <td class="py-3.5 px-4 text-center">2</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">10:12</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#024</td>
                            <td class="py-3.5 px-4">Natalie Chen</td>
                            <td class="py-3.5 px-4 text-slate-500">11 TKJ</td>
                            <td class="py-3.5 px-4">Kentang Goreng</td>
                            <td class="py-3.5 px-4 text-center">1</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">10:08</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#023</td>
                            <td class="py-3.5 px-4">Bryan Christian</td>
                            <td class="py-3.5 px-4 text-slate-500">11 BID</td>
                            <td class="py-3.5 px-4">Nasi Katsu</td>
                            <td class="py-3.5 px-4 text-center">2</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Diproses" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">10:05</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#022</td>
                            <td class="py-3.5 px-4">Michelle Lim</td>
                            <td class="py-3.5 px-4 text-slate-500">12 AKL</td>
                            <td class="py-3.5 px-4">Es Matcha Latte</td>
                            <td class="py-3.5 px-4 text-center">1</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Siap" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">10:01</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#021</td>
                            <td class="py-3.5 px-4">Jason Pratama</td>
                            <td class="py-3.5 px-4 text-slate-500">12 TKJ</td>
                            <td class="py-3.5 px-4">Nasi Goreng</td>
                            <td class="py-3.5 px-4 text-center">1</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">09:58</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#020</td>
                            <td class="py-3.5 px-4">David Kurniawan</td>
                            <td class="py-3.5 px-4 text-slate-500">10 TKJ</td>
                            <td class="py-3.5 px-4">Roti Bakar Cokelat</td>
                            <td class="py-3.5 px-4 text-center">2</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">09:45</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#019</td>
                            <td class="py-3.5 px-4">Siska Amelia</td>
                            <td class="py-3.5 px-4 text-slate-500">11 AKL</td>
                            <td class="py-3.5 px-4">Es Jeruk Peras</td>
                            <td class="py-3.5 px-4 text-center">3</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">09:30</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#018</td>
                            <td class="py-3.5 px-4">Alvin Wijaya</td>
                            <td class="py-3.5 px-4 text-slate-500">12 BID</td>
                            <td class="py-3.5 px-4">Ayam Bakar</td>
                            <td class="py-3.5 px-4 text-center">1</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">09:15</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">#017</td>
                            <td class="py-3.5 px-4">Clara Stephanie</td>
                            <td class="py-3.5 px-4 text-slate-500">10 AKL</td>
                            <td class="py-3.5 px-4">Teh Obeng</td>
                            <td class="py-3.5 px-4 text-center">2</td>
                            <td class="py-3.5 px-4 text-center"><x-badge status="Selesai" /></td>
                            <td class="py-3.5 px-4 text-right text-slate-400">09:05</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal Footer -->
            <div class="p-4 border-t border-slate-100 text-right bg-slate-50 shrink-0">
                <button @click="showModal = false"
                    class="px-5 py-2 bg-[#59142b] text-white text-xs font-bold rounded-xl shadow hover:bg-[#4a1024] transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#59142b] text-white px-8 py-3 flex items-center justify-between text-xs font-semibold mt-8">
        <div class="tracking-wider">SEMAT</div>
        <div class="text-white/70">©2026 SEMAT Kelompok 4</div>
    </footer>

    <!-- Script Init Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('salesChart').getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, 0, 250);
            gradient.addColorStop(0, 'rgba(89, 20, 43, 0.25)');
            gradient.addColorStop(1, 'rgba(89, 20, 43, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        ['Sen', '1 Sep'],
                        ['Sel', '2 Sep'],
                        ['Rab', '3 Sep'],
                        ['Kam', '4 Sep'],
                        ['Jum', '5 Sep'],
                        ['Sab', '6 Sep'],
                        ['Min', '7 Sep'],
                        ['Sen', '8 Sep']
                    ],
                    datasets: [{
                        data: [210000, 320000, 290000, 460000, 320000, 465000, 350000, 620000],
                        borderColor: '#59142b',
                        borderWidth: 2,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#59142b',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 800000,
                            ticks: {
                                stepSize: 200000,
                                callback: function (value) {
                                    return value === 0 ? '0' : (value / 1000) + 'K';
                                },
                                font: { size: 11, weight: 'bold' },
                                color: '#64748b'
                            },
                            grid: { color: '#f1f5f9' }
                        },
                        x: {
                            ticks: {
                                font: { size: 11, weight: 'bold' },
                                color: '#64748b'
                            },
                            grid: { display: false }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>