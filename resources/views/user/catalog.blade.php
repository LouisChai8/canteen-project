@extends('layouts.app')

@section('content')
<div class="space-y-8 pb-32">

    @if (session('error'))
        <x-alert class="bg-rose-100 border border-rose-300 text-rose-800">{{ session('error') }}</x-alert>
    @endif

    <!-- Header & Search -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-[#59142b]">Penjualan Terlaris Hari Ini</h2>

        <form action="{{ route('catalog') }}" method="GET" class="relative w-full md:w-80">
            @if ($category)
                <input type="hidden" name="category" value="{{ $category }}">
            @endif
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari Menu...."
                class="w-full pl-9 pr-4 py-2 text-xs bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-[#59142b]">
            <div class="absolute left-3 top-2.5 text-slate-400 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </form>
    </div>

    <!-- Hottest Seller Tabs (Filter Best Seller & Redirect Query untuk Katalog Bawah) -->
    <div class="space-y-4">
        <div class="select-none flex items-center gap-2" id="hotTabs">
            @php($tabBase = 'text-xs px-5 py-2 rounded-lg font-medium transition text-white')
            <a href="{{ route('catalog', array_filter(['q' => $search])) }}"
                class="{{ !$category ? 'bg-[#59142b]' : 'bg-[#ba798c] hover:bg-[#a66275]' }} {{ $tabBase }}">Semua</a>
            @foreach ($categories as $cat)
                <a href="{{ route('catalog', array_filter(['category' => $cat, 'q' => $search])) }}"
                    class="{{ $category === $cat ? 'bg-[#59142b]' : 'bg-[#ba798c] hover:bg-[#a66275]' }} {{ $tabBase }}">{{ $cat }}</a>
            @endforeach
        </div>

        <div id="hotGrid" class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @foreach ($bestSellers as $menu)
                @include('user.partials.menu-card', ['menu' => $menu, 'badge' => 'BEST SELLER'])
            @endforeach
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

    <!-- Main Catalog (Tampil otomatis ter-filter berdasarkan pilihan kategori di atas) -->
    <div class="space-y-4">
        <h2 class="text-2xl font-bold text-[#59142b]">
            Menu Katalog
            @if ($category)
                <span class="text-sm font-medium text-slate-500">— Kategori "{{ $category }}"</span>
            @endif
            @if ($search)
                <span class="text-sm font-medium text-slate-500">— hasil untuk "{{ $search }}"</span>
            @endif
        </h2>

        @if ($menus->isEmpty())
            <div class="bg-white border border-slate-200 rounded-3xl p-10 text-center text-xs text-slate-500 space-y-2">
                <p class="font-bold text-slate-800 text-sm">Menu tidak ditemukan</p>
                <p>Coba kata kunci lain atau pilih kategori yang berbeda.</p>
                <a href="{{ route('catalog') }}" class="inline-block mt-2 text-[#59142b] font-bold hover:underline">Reset pencarian</a>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @foreach ($menus as $menu)
                    @include('user.partials.menu-card', ['menu' => $menu, 'badge' => $menu->category])
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Modal Detail Makanan -->
<div id="detailModal" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white w-full max-w-sm rounded-3xl p-5 shadow-xl relative my-auto max-h-[90vh] overflow-y-auto">
        <button onclick="closeDetailModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="h-40 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3 mt-1">
            <img id="modalImg" src="" alt="" class="w-full h-full object-cover">
        </div>

        <h3 id="modalTitle" class="font-bold text-lg text-slate-900 tracking-tight"></h3>
        <p id="modalDesc" class="text-xs text-slate-500 mt-1 leading-relaxed"></p>

        <div id="levelContainer" class="mt-4 pt-3 border-t border-slate-100 hidden">
            <label class="block text-xs font-bold text-slate-800 mb-2">Pilih Level Pedas</label>
            <div id="levelOptions" class="grid grid-cols-5 gap-1.5"></div>
        </div>

        <div class="mt-4 pt-3 border-t border-slate-100">
            <label for="itemNotes" class="block text-xs font-bold text-slate-800 mb-1.5">Catatan Tambahan</label>
            <textarea id="itemNotes" rows="2" maxlength="100" placeholder="Contoh: Tanpa kuah, pisah sambal, dsb."
                class="w-full text-xs p-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#59142b] focus:bg-white resize-none"></textarea>
        </div>

        <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100">
            <div>
                <span class="block text-[10px] text-slate-400 uppercase font-semibold">Harga</span>
                <span id="modalPrice" class="text-sm font-extrabold text-[#59142b]"></span>
            </div>
            <div class="flex items-center gap-3 bg-slate-100 px-3 py-1.5 rounded-full">
                <button type="button" onclick="changeQty(-1)" class="w-6 h-6 rounded-full bg-white text-slate-700 font-bold text-xs shadow-sm flex items-center justify-center hover:bg-slate-200">-</button>
                <span id="modalQty" class="text-xs font-bold text-slate-800">1</span>
                <button type="button" onclick="changeQty(1)" class="w-6 h-6 rounded-full bg-[#59142b] text-white font-bold text-xs shadow-sm flex items-center justify-center hover:opacity-90">+</button>
            </div>
        </div>

        <button id="modalAddBtn" onclick="addToCart()" class="w-full mt-4 bg-[#59142b] text-white text-xs font-bold py-3 rounded-2xl hover:opacity-90 transition shadow-md">
            Tambah Ke Keranjang
        </button>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed top-20 left-1/2 -translate-x-1/2 z-[60] hidden text-xs font-semibold px-4 py-2.5 rounded-xl shadow-lg max-w-sm text-center"></div>

<!-- Cart Backdrop -->
<div id="cartBackdrop" onclick="closeCartDrawer()" class="fixed inset-0 bg-black/40 backdrop-blur-xs z-30 hidden transition-opacity duration-300"></div>

<!-- Floating Cart Drawer -->
<div id="floatingCart" class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg bg-[#59142b] text-white rounded-t-3xl shadow-2xl z-40 hidden transition-all duration-300 overflow-hidden">
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

    <div id="cartDrawerContent" class="hidden max-h-[60vh] overflow-y-auto p-4 bg-[#4a1024] space-y-3">
        <h4 class="text-xs font-bold text-amber-300 uppercase tracking-wider mb-2">Rincian Pesanan Kamu</h4>
        <div id="cartItemsList" class="space-y-2.5"></div>
    </div>
</div>

<!-- Script Sederhana dan Natural -->
<script>
    const MENUS = @json($menuData);
    const ADD_URL = @json(route('cart.add'));
    const REMOVE_URL = @json(route('cart.remove', ':id'));
    const CSRF = @json(csrf_token());

    let cart = @json($cartSummary);
    let currentMenu = null;
    let currentQty = 1;
    let selectedLevel = 1;
    let isDrawerOpen = false;

    // Format Rupiah
    function formatRupiah(angka) {
        return 'RP ' + Number(angka).toLocaleString('id-ID');
    }

    // Tampilkan Toast Notifikasi
    function showToast(message, isSuccess = true) {
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.className = 'fixed top-20 left-1/2 -translate-x-1/2 z-[60] text-xs font-semibold px-4 py-2.5 rounded-xl shadow-lg max-w-sm text-center ' +
            (isSuccess ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white');
        
        toast.classList.remove('hidden');
        clearTimeout(toast.timeout);
        toast.timeout = setTimeout(() => {
            toast.classList.add('hidden');
        }, 2500);
    }

    // Helper untuk request API Keranjang
    async function sendRequest(url, method, data = null) {
        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF
                },
                body: data ? JSON.stringify(data) : null
            });

            const result = await response.json();
            if (result.cart) {
                cart = result.cart;
                updateFloatingCart();
            }

            if (!response.ok) {
                throw new Error(result.message || 'Terjadi kesalahan pada sistem.');
            }

            return result;
        } catch (error) {
            throw error;
        }
    }

    // Modal Detail Makanan
    function openDetailModal(id) {
        const menu = MENUS[id];
        if (!menu) return;

        currentMenu = menu;
        currentQty = 1;
        selectedLevel = 1;

        document.getElementById('modalTitle').textContent = menu.name;
        document.getElementById('modalPrice').textContent = formatRupiah(menu.price);
        document.getElementById('modalImg').src = menu.image;
        document.getElementById('modalDesc').textContent = menu.description || '';
        document.getElementById('modalQty').textContent = currentQty;
        document.getElementById('itemNotes').value = '';

        // Cek jika menu makanan pedas (ayam geprek / mie goreng)
        const levelContainer = document.getElementById('levelContainer');
        const isSpicy = ['ayam geprek', 'mie goreng'].some(name => menu.name.toLowerCase().includes(name));

        if (isSpicy) {
            levelContainer.classList.remove('hidden');
            const levelOptions = document.getElementById('levelOptions');
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

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    function selectLevel(level, element) {
        selectedLevel = level;
        document.querySelectorAll('.level-btn').forEach(btn => {
            btn.className = 'level-btn border rounded-xl py-2 text-xs font-bold transition flex flex-col items-center justify-center bg-slate-50 text-slate-700 border-slate-200 hover:border-[#59142b]';
        });
        element.className = 'level-btn border rounded-xl py-2 text-xs font-bold transition flex flex-col items-center justify-center bg-[#59142b] text-white border-[#59142b]';
    }

    function changeQty(amount) {
        currentQty += amount;
        if (currentQty < 1) currentQty = 1;
        document.getElementById('modalQty').textContent = currentQty;
    }

    // Tambah ke keranjang dari modal
    async function addToCart() {
        let noteParts = [];
        const isSpicy = ['ayam geprek', 'mie goreng'].some(name => currentMenu.name.toLowerCase().includes(name));
        
        if (isSpicy) {
            noteParts.push(`Level Pedas ${selectedLevel}`);
        }

        const notesInput = document.getElementById('itemNotes').value.trim();
        if (notesInput) {
            noteParts.push(notesInput);
        }

        const finalNote = noteParts.length > 0 ? noteParts.join(' • ') : null;
        const addBtn = document.getElementById('modalAddBtn');
        addBtn.disabled = true;

        try {
            const response = await sendRequest(ADD_URL, 'POST', {
                menu_id: currentMenu.id,
                quantity: currentQty,
                note: finalNote
            });

            showToast(response.message || 'Berhasil ditambahkan ke keranjang!');
            closeDetailModal();
        } catch (error) {
            showToast(error.message, false);
        } finally {
            addBtn.disabled = false;
        }
    }

    // Tombol plus kecil langsung di kartu menu
    async function quickAdd(id) {
        const menu = MENUS[id];
        if (!menu) return;

        const isSpicy = ['ayam geprek', 'mie goreng'].some(name => menu.name.toLowerCase().includes(name));
        if (isSpicy) {
            return openDetailModal(id);
        }

        try {
            const response = await sendRequest(ADD_URL, 'POST', {
                menu_id: menu.id,
                quantity: 1,
                note: null
            });

            showToast(response.message || 'Berhasil ditambahkan ke keranjang!');
        } catch (error) {
            showToast(error.message, false);
        }
    }

    // Hapus item dari keranjang
    async function removeCartItem(itemId) {
        try {
            const url = REMOVE_URL.replace(':id', itemId);
            await sendRequest(url, 'DELETE');

            if (cart.items.length === 0) {
                closeCartDrawer();
            }
        } catch (error) {
            showToast(error.message, false);
        }
    }

    // Update tampilan floating cart di bawah
    function updateFloatingCart() {
        const floatingCart = document.getElementById('floatingCart');
        
        if (cart.count > 0) {
            document.getElementById('floatingItemCount').textContent = cart.count;
            document.getElementById('floatingItemText').textContent = cart.count + ' Item terpilih';
            document.getElementById('floatingTotalPrice').textContent = formatRupiah(cart.total);
            floatingCart.classList.remove('hidden');
            renderCartList();
        } else {
            floatingCart.classList.add('hidden');
        }
    }

    // Render daftar item di drawer keranjang
    function renderCartList() {
        const container = document.getElementById('cartItemsList');
        container.innerHTML = '';

        cart.items.forEach(item => {
            container.innerHTML += `
                <div class="bg-white/10 p-3 rounded-2xl flex items-start justify-between gap-3 text-xs">
                    <div class="space-y-1">
                        <p class="font-bold text-white">${item.name} <span class="text-amber-300">x${item.qty}</span></p>
                        ${item.note ? `<p class="text-[11px] text-slate-300 italic">${item.note}</p>` : ''}
                        <p class="font-extrabold text-white/90 pt-1">${formatRupiah(item.subtotal)}</p>
                    </div>
                    <button onclick="removeCartItem(${item.id})" class="text-rose-300 hover:text-rose-100 p-1" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            `;
        });
    }

    // Buka/Tutup Drawer Keranjang
    function toggleCartDrawer() {
        if (cart.items.length === 0) {
            closeCartDrawer();
            return;
        }

        isDrawerOpen = !isDrawerOpen;
        const drawerContent = document.getElementById('cartDrawerContent');
        const cartArrowIcon = document.getElementById('cartArrowIcon');
        const backdrop = document.getElementById('cartBackdrop');

        if (isDrawerOpen) {
            drawerContent.classList.remove('hidden');
            cartArrowIcon.classList.add('rotate-180');
            backdrop.classList.remove('hidden');
        } else {
            closeCartDrawer();
        }
    }

    function closeCartDrawer() {
        isDrawerOpen = false;
        document.getElementById('cartDrawerContent').classList.add('hidden');
        document.getElementById('cartArrowIcon').classList.remove('rotate-180');
        document.getElementById('cartBackdrop').classList.add('hidden');
    }

    // Inisialisasi floating cart saat halaman pertama kali dimuat
    updateFloatingCart();
</script>
@endsection