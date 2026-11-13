@php($soldOut = $menu->stock < 1)

<div data-category="{{ $menu->category }}" @unless($soldOut) onclick="openDetailModal({{ $menu->id }})" @endunless
    class="select-none relative bg-white border border-slate-300 rounded-3xl p-2.5 flex flex-col justify-between shadow-sm overflow-hidden transition
        {{ $soldOut ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer hover:border-[#59142b]' }}">

    <span
        class="absolute top-0 left-0 bg-[#59142b] text-white text-[10px] px-3 py-1 rounded-tl-[22px] rounded-br-xl font-semibold z-10">
        {{ $badge }}
    </span>

    @if ($soldOut)
        <span
            class="absolute top-0 right-0 bg-slate-700 text-white text-[10px] px-3 py-1 rounded-tr-[22px] rounded-bl-xl font-semibold z-10">Habis</span>
    @elseif ($menu->stock <= 5)
        <span
            class="absolute top-0 right-0 bg-amber-400 text-[#59142b] text-[10px] px-3 py-1 rounded-tr-[22px] rounded-bl-xl font-bold z-10">Sisa
            {{ $menu->stock }}</span>
    @endif

    <div>
        <div class="h-32 w-full rounded-2xl overflow-hidden bg-slate-100 mb-3">
            <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}"
                class="w-full h-full object-cover {{ $soldOut ? 'grayscale' : '' }}">
        </div>
        <h3 class="font-bold text-xs text-slate-800 tracking-tight">{{ $menu->name }}</h3>
    </div>

    <div class="flex items-center justify-between mt-3">
        <span class="text-xs font-bold text-slate-900">RP {{ number_format($menu->price, 0, ',', '.') }}</span>
        <button type="button" @disabled($soldOut) onclick="event.stopPropagation(); quickAdd({{ $menu->id }})" class="w-6 h-6 bg-[#59142b] text-white rounded-full flex items-center justify-center transition
                {{ $soldOut ? 'opacity-40 cursor-not-allowed' : 'hover:opacity-90' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
</div>