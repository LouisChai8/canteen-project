@extends('layouts.app')

@section('content')
<div class="space-y-8">

    <!-- Header & Search -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-[#59142b]">Today's Hottest Seller</h2>

        <div class="relative w-full md:w-80">
            <input type="text" placeholder="Cari Menu...."
                class="w-full pl-9 pr-4 py-2 text-xs bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-[#59142b]">
            <div class="absolute left-3 top-2.5 text-slate-400 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Today's Hottest Seller Section -->
    <div class="space-y-4">
        <!-- Filter Tabs -->
        <div class="flex items-center gap-2">
            <button class="bg-[#59142b] text-white text-xs px-5 py-2 rounded-lg font-medium">Semua</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Makanan</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Minuman</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Cemilan</button>
        </div>

        <!-- Hottest Grid -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">

            <!-- Item 1 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Geprek.png') }}" alt="Ayam Geprek" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight">AYAM GEPREK</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Fries.png') }}" alt="Kentang Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Kentang Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Thai.png') }}" alt="Thai Tea" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Thai Tea</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Migor.png') }}" alt="Mie Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Mie Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Dimsum.png') }}" alt="Dimsum" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Dimsum</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 7.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Promo Banner with Navigation Buttons -->
    <div class="rounded-3xl overflow-hidden shadow-sm relative h-44 md:h-52 bg-white group">
        <img src="{{ asset('images/Banner.png') }}" alt="Promo Banner" class="w-full h-full object-cover object-left">

        <!-- Banner Prev Button -->
        <button class="absolute left-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-sm text-white flex items-center justify-center transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- Banner Next Button -->
        <button class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-sm text-white flex items-center justify-center transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>

    <!-- Main Catalog Section -->
    <div class="space-y-4">
        <h2 class="text-2xl font-bold text-[#59142b]">Menu Katalog</h2>

        <!-- Filter Tabs -->
        <div class="flex items-center gap-2">
            <button class="bg-[#59142b] text-white text-xs px-5 py-2 rounded-lg font-medium">Semua</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Makanan</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Minuman</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Cemilan</button>
        </div>

        <!-- Catalog Grid -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">

            <!-- Catalog Item 1 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Geprek.png') }}" alt="Ayam Geprek" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">AYAM GEPREK</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 2 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Minuman</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Thai.png') }}" alt="Thai Tea" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Thai Tea</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 8.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 3 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Cemilan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Fries.png') }}" alt="Kentang Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Kentang Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 4 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Minuman</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Teh.png') }}" alt="Teh Es" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Teh Es</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 5.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 5 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Minuman</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Tahu.png') }}" alt="Air Tahu" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Air Tahu</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 5.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 6 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Tela.png') }}" alt="Tela - Tela" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">Tela - Tela</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 7 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Migor.png') }}" alt="Mie Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">Mie Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 8 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Cemilan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Dimsum.png') }}" alt="Dimsum" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">Dimsum</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 9 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Naskun.png') }}" alt="Nasi Kuning" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">Nasi Kuning</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catalog Item 10 -->
            <div class="relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Nasjer.png') }}" alt="Nasi Jeruk" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">Nasi Jeruk</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection