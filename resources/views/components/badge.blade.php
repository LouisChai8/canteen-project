@props(['status' => 'Diproses'])

@php
    $config = [
        'Diproses' => [
            'bg'  => 'bg-amber-100 text-amber-700',
            'dot' => 'bg-amber-500',
        ],
        'Siap' => [
            'bg'  => 'bg-emerald-100 text-emerald-700',
            'dot' => 'bg-emerald-500',
        ],
        'Selesai' => [
            'bg'  => 'bg-rose-100 text-rose-700',
            'dot' => 'bg-rose-600',
        ],
    ];

    $current = $config[$status] ?? [
        'bg'  => 'bg-slate-100 text-slate-600',
        'dot' => 'bg-slate-400',
    ];
@endphp

<span {{ $attributes->merge(['class' => "px-3 py-1 rounded-full text-[11px] font-bold inline-flex items-center justify-center gap-1.5 min-w-[90px] {$current['bg']}"]) }}>
    <span class="w-2 h-2 rounded-full shrink-0 {{ $current['dot'] }} animate-pulse"></span>
    <span class="leading-none">{{ $status }}</span>
</span>