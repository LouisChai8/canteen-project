@extends('layouts.app')

@section('content')
<div class="space-y-8 pb-32">

    <!-- Header n Search -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-[#59142b]">Penjualan Terlaris Hari Ini</h2>

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

    <!-- Today's Hottest Seller -->
    <div class="space-y-4">
        <!-- Filter Tabs -->
        <div class="select-none flex items-center gap-2">
            <button class="bg-[#59142b] text-white text-xs px-5 py-2 rounded-lg font-medium">Semua</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Makanan</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Minuman</button>
            <button class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Cemilan</button>
        </div>

        <!-- Hottest Grid -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">

            <!-- Item 1 -->
            <div onclick="openDetailModal('Ayam Geprek', 10000, '{{ asset('images/Geprek.png') }}', 'Ayam goreng crispy digeprek dengan sambal cabai gurih.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Geprek.png') }}" alt="Ayam Geprek" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight">AYAM GEPREK</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Ayam Geprek', 10000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 2 -->
            <div onclick="openDetailModal('Kentang Goreng', 10000, '{{ asset('images/Fries.png') }}', 'Kentang goreng renyah dipadu bumbu gurih khas kantin.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Cemilan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Fries.png') }}" alt="Kentang Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Kentang Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Kentang Goreng', 10000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 3 -->
            <div onclick="openDetailModal('Thai Tea', 10000, '{{ asset('images/Thai.png') }}', 'Minuman teh khas Thailand manis dan segar dengan susu kental manis.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Thai.png') }}" alt="Thai Tea" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Thai Tea</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Thai Tea', 10000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 4 -->
            <div onclick="openDetailModal('Mie Goreng', 10000, '{{ asset('images/Migor.png') }}', 'Mie goreng instan favorit disajikan lengkap dengan sayuran & bumbu rahasia.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Migor.png') }}" alt="Mie Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Mie Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Mie Goreng', 10000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 5 -->
            <div onclick="openDetailModal('Dimsum', 7000, '{{ asset('images/Dimsum.png') }}', 'Dimsum lembut isi daging olahan disajikan dengan saus pedas manis.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">BEST SELLER</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Dimsum.png') }}" alt="Dimsum" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Dimsum</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 7.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Dimsum', 7000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Banner -->
    <div class="rounded-3xl overflow-hidden shadow-sm relative h-44 md:h-52 bg-white group">
        <img src="{{ asset('images/Banner.png') }}" alt="Promo Banner" class="w-full h-full object-cover object-left">

        <button class="absolute left-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-sm text-white flex items-center justify-center transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>

        <button class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-sm text-white flex items-center justify-center transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>

    <!-- Main Catalog  -->
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

            <!-- Item 1 -->
            <div onclick="openDetailModal('Ayam Geprek', 10000, '{{ asset('images/Geprek.png') }}', 'Ayam goreng crispy digeprek dengan sambal cabai gurih.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Makanan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Geprek.png') }}" alt="Ayam Geprek" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">AYAM GEPREK</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Ayam Geprek', 10000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 2 -->
            <div onclick="openDetailModal('Thai Tea', 8000, '{{ asset('images/Thai.png') }}', 'Minuman teh khas Thailand manis dan segar dengan susu kental manis.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Minuman</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Thai.png') }}" alt="Thai Tea" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Thai Tea</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 8.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Thai Tea', 8000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 3 -->
            <div onclick="openDetailModal('Kentang Goreng', 10000, '{{ asset('images/Fries.png') }}', 'Kentang goreng renyah dipadu bumbu gurih khas kantin.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Cemilan</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Fries.png') }}" alt="Kentang Goreng" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Kentang Goreng</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 10.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Kentang Goreng', 10000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 4 -->
            <div onclick="openDetailModal('Teh Es', 5000, '{{ asset('images/Teh.png') }}', 'Es teh manis segar pelepas dahaga saat istirahat.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Minuman</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Teh.png') }}" alt="Teh Es" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Teh Es</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 5.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Teh Es', 5000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Item 5 -->
            <div onclick="openDetailModal('Air Tahu', 5000, '{{ asset('images/Tahu.png') }}', 'Susu kedelai / air tahu murni hangat/dingin yang sehat.')" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
                <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">Minuman</span>
                <div>
                    <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
                        <img src="{{ asset('images/Tahu.png') }}" alt="Air Tahu" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-xs text-slate-800 tracking-tight">Air Tahu</h3>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-xs font-bold text-slate-900">RP 5.000</span>
                    <button onclick="event.stopPropagation(); quickAddToCart('Air Tahu', 5000)" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Pop-up Modal Detail Makanan -->
<div id="detailModal" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white w-full max-w-sm rounded-3xl p-5 shadow-xl relative my-auto animate-in fade-in zoom-in duration-200 max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button onclick="closeDetailModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Product Image -->
        <div class="h-40 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3 mt-1">
            <img id="modalImg" src="" alt="" class="w-full h-full object-cover">
        </div>

        <!-- Product Details -->
        <h3 id="modalTitle" class="font-bold text-lg text-slate-900 tracking-tight"></h3>
        <p id="modalDesc" class="text-xs text-slate-500 mt-1 leading-relaxed"></p>

        <!-- Options Container -->
        <div id="levelContainer" class="mt-4 pt-3 border-t border-slate-100 hidden">
            <label id="levelLabel" class="block text-xs font-bold text-slate-800 mb-2">Pilih Level Pedas</label>
            <div id="levelOptions" class="grid grid-cols-5 gap-1.5"></div>
        </div>

        <!-- Notes Input -->
        <div class="mt-4 pt-3 border-t border-slate-100">
            <label for="itemNotes" class="block text-xs font-bold text-slate-800 mb-1.5">Catatan Tambahan</label>
            <textarea id="itemNotes" rows="2" placeholder="Contoh: Tanpa kuah, pisah sambal, dsb."
                class="w-full text-xs p-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#59142b] focus:bg-white resize-none"></textarea>
        </div>

        <!-- Counter & Add Button -->
        <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100">
            <div>
                <span class="block text-[10px] text-slate-400 uppercase font-semibold">Harga</span>
                <span id="modalPrice" class="text-sm font-extrabold text-[#59142b]"></span>
            </div>

            <div class="flex items-center gap-3 bg-slate-100 px-3 py-1.5 rounded-full">
                <button onclick="decreaseQty()" class="w-6 h-6 rounded-full bg-white text-slate-700 font-bold text-xs shadow-sm flex items-center justify-center hover:bg-slate-200">-</button>
                <span id="modalQty" class="text-xs font-bold text-slate-800">1</span>
                <button onclick="increaseQty()" class="w-6 h-6 rounded-full bg-[#59142b] text-white font-bold text-xs shadow-sm flex items-center justify-center hover:opacity-90">+</button>
            </div>
        </div>

        <button onclick="addToCart()" class="w-full mt-4 bg-[#59142b] text-white text-xs font-bold py-3 rounded-2xl hover:opacity-90 transition shadow-md">
            Tambah Ke Keranjang
        </button>
    </div>
</div>

<!-- Backdrop Overlay khusus untuk Floating Cart Expand -->
<div id="cartBackdrop" onclick="closeCartDrawer()" class="fixed inset-0 bg-black/40 backdrop-blur-xs z-30 hidden transition-opacity duration-300"></div>

<!-- Expandable Floating Cart Drawer -->
<div id="floatingCart" class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg bg-[#59142b] text-white rounded-t-3xl shadow-2xl z-40 hidden transition-all duration-300 overflow-hidden">
    
    <!-- Header Bar -->
    <div onclick="toggleCartDrawer()" class="p-4 cursor-pointer flex items-center justify-between select-none border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="relative bg-white/10 p-2.5 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span id="floatingItemCount" class="absolute -top-1.5 -right-1.5 bg-amber-400 text-[#59142b] text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">0</span>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <p id="floatingItemText" class="text-[11px] text-slate-200">0 Item terpilih</p>
                    
                    <!-- Arrow Icon -->
                    <svg id="cartArrowIcon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-300 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                </div>
                <p id="floatingTotalPrice" class="text-sm font-extrabold text-white">RP 0</p>
            </div>
        </div>

        <a href="{{ route('checkout') }}" onclick="event.stopPropagation()" class="bg-white text-[#59142b] text-xs font-bold px-4 py-2.5 rounded-xl hover:bg-slate-100 transition flex items-center gap-1.5 shadow-sm">
            <span>Checkout</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>

    <!-- Drawer Content (List Pesanan) -->
    <div id="cartDrawerContent" class="hidden max-h-[60vh] overflow-y-auto p-4 bg-[#4a1024] space-y-3">
        <h4 class="text-xs font-bold text-amber-300 uppercase tracking-wider mb-2">Rincian Pesanan Kamu</h4>
        
        <div id="cartItemsList" class="space-y-2.5">
            <!-- List item order dipopulasikan lewat JS -->
        </div>
    </div>
</div>

<!-- Vanilla JS Logic -->
<script>
    let currentItem = { name: '', price: 0, img: '', desc: '' };
    let currentQty = 1;
    let selectedLevel = 1;
    let cartItems = [];
    let isDrawerOpen = false;

    function openDetailModal(name, price, img, desc) {
        currentItem = { name, price, img, desc };
        currentQty = 1;
        selectedLevel = 1;

        document.getElementById('modalTitle').innerText = name;
        document.getElementById('modalPrice').innerText = 'RP ' + price.toLocaleString('id-ID');
        document.getElementById('modalImg').src = img;
        document.getElementById('modalDesc').innerText = desc;
        document.getElementById('modalQty').innerText = currentQty;
        document.getElementById('itemNotes').value = '';

        const levelContainer = document.getElementById('levelContainer');
        const levelOptions = document.getElementById('levelOptions');

        const isSpicyFood = ['ayam geprek', 'mie goreng', 'nasi jeruk'].some(v => name.toLowerCase().includes(v));

        if (isSpicyFood) {
            levelContainer.classList.remove('hidden');
            levelOptions.innerHTML = '';

            for (let i = 1; i <= 5; i++) {
                const activeClass = i === 1 
                    ? 'bg-[#59142b] text-white border-[#59142b]' 
                    : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-[#59142b]';

                levelOptions.innerHTML += `
                    <button type="button" onclick="selectLevel(${i}, this)" 
                        class="level-btn border rounded-xl py-2 text-xs font-bold transition flex flex-col items-center justify-center ${activeClass}">
                        <span>Lvl ${i}</span>
                    </button>
                `;
            }
        } else {
            levelContainer.classList.add('hidden');
        }

        document.getElementById('detailModal').classList.remove('hidden');
    }

    function selectLevel(lvl, element) {
        selectedLevel = lvl;
        document.querySelectorAll('.level-btn').forEach(btn => {
            btn.className = 'level-btn border rounded-xl py-2 text-xs font-bold transition flex flex-col items-center justify-center bg-slate-50 text-slate-700 border-slate-200 hover:border-[#59142b]';
        });
        element.className = 'level-btn border rounded-xl py-2 text-xs font-bold transition flex flex-col items-center justify-center bg-[#59142b] text-white border-[#59142b]';
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    function increaseQty() {
        currentQty++;
        document.getElementById('modalQty').innerText = currentQty;
    }

    function decreaseQty() {
        if (currentQty > 1) {
            currentQty--;
            document.getElementById('modalQty').innerText = currentQty;
        }
    }

    function addToCart() {
        const notes = document.getElementById('itemNotes').value.trim();
        const isSpicyFood = ['ayam geprek', 'mie goreng', 'nasi jeruk'].some(v => currentItem.name.toLowerCase().includes(v));

        cartItems.push({
            name: currentItem.name,
            price: currentItem.price,
            qty: currentQty,
            level: isSpicyFood ? selectedLevel : null,
            notes: notes
        });

        updateFloatingCart();
        closeDetailModal();
    }

    function quickAddToCart(name, price) {
        cartItems.push({
            name: name,
            price: price,
            qty: 1,
            level: null,
            notes: ''
        });

        updateFloatingCart();
    }

    function removeCartItem(index) {
        cartItems.splice(index, 1);
        updateFloatingCart();
        
        if (cartItems.length === 0) {
            closeCartDrawer();
        }
    }

    function updateFloatingCart() {
        const floatingCart = document.getElementById('floatingCart');
        const totalItems = cartItems.reduce((sum, item) => sum + item.qty, 0);
        const totalPrice = cartItems.reduce((sum, item) => sum + (item.price * item.qty), 0);

        if (totalItems > 0) {
            document.getElementById('floatingItemCount').innerText = totalItems;
            document.getElementById('floatingItemText').innerText = totalItems + ' Item terpilih';
            document.getElementById('floatingTotalPrice').innerText = 'RP ' + totalPrice.toLocaleString('id-ID');
            floatingCart.classList.remove('hidden');
            renderCartList();
        } else {
            floatingCart.classList.add('hidden');
        }
    }

    function renderCartList() {
        const container = document.getElementById('cartItemsList');
        container.innerHTML = '';

        cartItems.forEach((item, index) => {
            container.innerHTML += `
                <div class="bg-white/10 p-3 rounded-2xl flex items-start justify-between gap-3 text-xs">
                    <div class="space-y-1">
                        <p class="font-bold text-white">${item.name} <span class="text-amber-300">x${item.qty}</span></p>
                        ${item.level ? `<span class="inline-block bg-amber-400/20 text-amber-300 text-[10px] px-2 py-0.5 rounded-md font-medium">Level Pedas ${item.level}</span>` : ''}
                        ${item.notes ? `<p class="text-[11px] text-slate-300 italic">"${item.notes}"</p>` : ''}
                        <p class="font-extrabold text-white/90 pt-1">RP ${(item.price * item.qty).toLocaleString('id-ID')}</p>
                    </div>
                    <button onclick="removeCartItem(${index})" class="text-rose-300 hover:text-rose-100 p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            `;
        });
    }

    function closeCartDrawer() {
        const drawerContent = document.getElementById('cartDrawerContent');
        const cartArrowIcon = document.getElementById('cartArrowIcon');
        const backdrop = document.getElementById('cartBackdrop');

        isDrawerOpen = false;
        drawerContent.classList.add('hidden');
        cartArrowIcon.classList.remove('rotate-180');
        backdrop.classList.add('hidden');
    }

    function toggleCartDrawer() {
        if (cartItems.length === 0) {
            closeCartDrawer();
            return;
        }

        const drawerContent = document.getElementById('cartDrawerContent');
        const cartArrowIcon = document.getElementById('cartArrowIcon');
        const backdrop = document.getElementById('cartBackdrop');

        isDrawerOpen = !isDrawerOpen;

        if (isDrawerOpen) {
            drawerContent.classList.remove('hidden');
            cartArrowIcon.classList.add('rotate-180');
            backdrop.classList.remove('hidden');
        } else {
            closeCartDrawer();
        }
    }
</script>
@endsection