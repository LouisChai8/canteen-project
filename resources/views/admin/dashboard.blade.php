@extends('layouts.admin')

@section('content')
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
@endsection