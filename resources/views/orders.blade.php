@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 pb-20">

    <!-- Flash Alert Status (Menggunakan Session Flash Laravel) -->
    @if(session('success'))
        <x-alert type="success" class="mb-4 bg-emerald-100 border border-emerald-300 text-emerald-800 text-xs p-4 rounded-2xl flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </x-alert>
    @endif

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#59142b]">Pesanan Saya</h2>
            <p class="text-xs text-slate-500">Pantau status pesanan makanan & minumanmu di sini.</p>
        </div>
        <a href="{{ route('history') }}" class="text-xs font-bold text-[#59142b] hover:underline flex items-center gap-1">
            <span>Lihat Riwayat</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>

    <!-- Active Orders Container -->
    <div id="activeOrdersList" class="space-y-4">

        <!-- Sample Order Card 1: Sedang Diproses (Dengang Estimasi Waktu) -->
        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">ID Pesanan</span>
                    <span class="text-xs font-extrabold text-slate-800">#ORD-20260910-01</span>
                </div>
                <div class="flex items-center gap-2">
                    <!-- Estimasi Waktu Pengambilan -->
                    <span class="bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-bold px-2.5 py-1 rounded-lg flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Estimasi Pengambilan: <span class="font-bold text-amber-800">9:10</span>
                    </span>
                    <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Sedang Diproses
                    </span>
                </div>
            </div>

            <!-- Items -->
            <div class="space-y-3">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                            <img src="{{ asset('images/Geprek.png') }}" alt="Ayam Geprek" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-slate-800">Ayam Geprek <span class="text-[#59142b]">x2</span></p>
                            <p class="text-[10px] text-slate-400">Level Pedas 3 • Extra Sambal</p>
                        </div>
                    </div>
                    <span class="font-bold text-slate-700">RP 20.000</span>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                            <img src="{{ asset('images/Thai.png') }}" alt="Thai Tea" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-slate-800">Thai Tea <span class="text-[#59142b]">x1</span></p>
                            <p class="text-[10px] text-slate-400">Less Ice</p>
                        </div>
                    </div>
                    <span class="font-bold text-slate-700">RP 8.000</span>
                </div>
            </div>

            <!-- Total & Action -->
            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                <div>
                    <span class="text-[10px] text-slate-400 uppercase block font-semibold">Total Pembayaran</span>
                    <span class="text-sm font-extrabold text-[#59142b]">RP 28.000</span>
                </div>
                <button disabled class="bg-slate-200 text-slate-400 text-xs font-bold px-4 py-2.5 rounded-xl cursor-not-allowed flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 animate-spin text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Sedang Disiapkan</span>
                </button>
            </div>
        </div>

        <!-- Sample Order Card 2: Siap Diambil -->
        <div class="bg-white border-2 border-[#59142b]/20 rounded-3xl p-5 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">ID Pesanan</span>
                    <span class="text-xs font-extrabold text-slate-800">#ORD-20260910-02</span>
                </div>
                <span class="bg-emerald-100 text-emerald-800 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Siap Diambil
                </span>
            </div>

            <!-- Items -->
            <div class="space-y-3">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                            <img src="{{ asset('images/Fries.png') }}" alt="Kentang Goreng" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-slate-800">Kentang Goreng <span class="text-[#59142b]">x1</span></p>
                        </div>
                    </div>
                    <span class="font-bold text-slate-700">RP 10.000</span>
                </div>
            </div>

            <!-- Total & Action Form Laravel (Tanpa JS/Alpine) -->
            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                <div>
                    <span class="text-[10px] text-slate-400 uppercase block font-semibold">Total Pembayaran</span>
                    <span class="text-sm font-extrabold text-[#59142b]">RP 10.000</span>
                </div>
                
                <form action="{{ route('history') }}" method="GET">
                    <button type="submit" class="bg-[#59142b] hover:opacity-90 text-white text-xs font-bold px-5 py-2.5 rounded-xl transition shadow-md flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        <span>Pesanan Sudah Diambil</span>
                    </button>
                </form>
            </div>
        </div>

    </div>

    <!-- Empty State -->
    <div id="emptyOrders" class="hidden bg-white border border-slate-200 rounded-3xl p-12 text-center space-y-3">
        <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.25 10.5a.75.75 0 100-1.5.75.75 0 000 1.5zm7.5 0a.75.75 0 100-1.5.75.75 0 000 1.5z" />
            </svg>
        </div>
        <h3 class="font-bold text-slate-800 text-base">Tidak Ada Pesanan Aktif</h3>
        <p class="text-xs text-slate-400 max-w-xs mx-auto">Semua pesanan kamu sudah selesai atau belum ada pesanan baru yang dibuat.</p>
        <a href="{{ route('catalog') }}" class="inline-block mt-2 bg-[#59142b] text-white text-xs font-bold px-6 py-3 rounded-2xl shadow-sm hover:opacity-90 transition">
            Pesan Makanan Sekarang
        </a>
    </div>

</div>
@endsection