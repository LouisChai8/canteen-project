<div onclick="openDetailModal({{ $menu->id }})" data-category="{{ $menu->category }}" class="select-none cursor-pointer relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden hover:border-[#59142b] transition">
    
    <!-- Badge Kategori / Best Seller -->
    <span class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">
        {{ $badge ?? $menu->category }}
    </span>

    <div>
        <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
            <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
        </div>
        <h3 class="font-bold text-xs text-slate-800 tracking-tight uppercase">{{ $menu->name }}</h3>
    </div>

    <div class="flex items-center justify-between mt-3">
        <span class="text-xs font-bold text-slate-900">RP {{ number_format($menu->price, 0, ',', '.') }}</span>
        
        <button type="button" onclick="event.stopPropagation(); quickAdd({{ $menu->id }})" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center hover:opacity-90 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
</div>