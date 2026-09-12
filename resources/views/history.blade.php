@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6 pb-20">

        <!-- Header & Search/Filter -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('orders') }}"
                        class="w-8 h-8 rounded-full bg-[#59142b] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <h2 class="text-2xl font-bold text-[#59142b]">Riwayat Transaksi</h2>
                </div>
                <p class="text-xs text-slate-500 pl-11 mt-0.5">Daftar transaksi pesanan yang telah selesai atau dibatalkan.
                </p>
            </div>

            <!-- Filter / Search Bar -->
            <div class="relative w-full md:w-72">
                <input type="text" placeholder="Cari ID Pesanan..."
                    class="w-full pl-9 pr-4 py-2 text-xs bg-white border border-slate-300 rounded-xl focus:outline-none focus:border-[#59142b]">
                <div class="absolute left-3 top-2.5 text-slate-400 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Filter Tabs Status -->
        <div class="flex items-center gap-2">
            <button class="bg-[#59142b] text-white text-xs px-5 py-2 rounded-lg font-medium">Semua</button>
            <button
                class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Selesai</button>
            <button
                class="bg-[#ba798c] hover:bg-[#a66275] text-white text-xs px-5 py-2 rounded-lg font-medium transition">Dibatalkan</button>
        </div>

        <!-- History Order List Dynamic -->
        <div class="space-y-4">
            @forelse ($histories as $history)
                <div
                    class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-4 hover:border-[#59142b]/30 transition">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-3">
                            <div
                                class="p-2 bg-slate-100 rounded-xl {{ $history['status'] === 'Selesai' ? 'text-[#59142b]' : 'text-slate-500' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-extrabold text-slate-800 block">{{ $history['order_id'] }}</span>
                                <span class="text-[10px] text-slate-400 font-medium">{{ $history['date'] }}</span>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        @if ($history['status'] === 'Selesai')
                            <span
                                class="bg-emerald-100 border border-emerald-200 text-emerald-800 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Selesai
                            </span>
                        @else
                            <span
                                class="bg-rose-100 border border-rose-200 text-rose-800 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                Dibatalkan
                            </span>
                        @endif
                    </div>

                    <!-- Items Brief -->
                    <div class="space-y-2">
                        @foreach ($history['items'] as $item)
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-3">
                                    <!-- Tag Gambar dengan fallback -->
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                                        class="w-10 h-10 rounded-lg object-cover shrink-0 bg-slate-100">
                                    <div>
                                        <p class="font-bold text-slate-800">{{ $item['name'] }} <span
                                                class="text-[#59142b]">x{{ $item['qty'] }}</span></p>
                                        @if ($item['note'] !== '-')
                                            <p class="text-[10px] text-slate-400">{{ $item['note'] }}</p>
                                        @endif
                                    </div>
                                </div>
                                <span class="font-semibold text-slate-700">RP
                                    {{ number_format($item['price'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Footer: Total & Detail Button -->
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase block font-semibold">Total Pesanan</span>
                            <span class="text-sm font-extrabold text-[#59142b]">RP
                                {{ number_format($history['total'], 0, ',', '.') }}</span>
                        </div>

                        <button
                            onclick="openHistoryDetail('{{ $history['order_id'] }}', '{{ $history['date'] }}', '{{ $history['status'] }}', 'RP {{ number_format($history['total'], 0, ',', '.') }}')"
                            class="border {{ $history['status'] === 'Selesai' ? 'border-[#59142b] text-[#59142b] hover:bg-[#59142b] hover:text-white' : 'border-slate-300 text-slate-600 hover:bg-slate-100' }} text-xs font-bold px-4 py-2 rounded-xl transition">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            @empty
                <div class="bg-white border border-slate-200 rounded-3xl p-8 text-center text-slate-500 text-xs">
                    Belum ada riwayat transaksi.
                </div>
            @endforelse
        </div>

    </div>

    <!-- Pop-up Modal Detail Transaksi Riwayat -->
    <div id="historyDetailModal"
        class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-3xl p-6 shadow-xl relative my-auto space-y-4">
            <button onclick="closeHistoryDetailModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="border-b border-slate-100 pb-3">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Detail Transaksi</span>
                <h3 id="modalOrderId" class="text-base font-extrabold text-slate-900"></h3>
                <p id="modalOrderDate" class="text-xs text-slate-400"></p>
            </div>

            <div class="space-y-3">
                <div class="flex items-center justify-between text-xs">
                    <span class="text-slate-500">Status Transaksi</span>
                    <span id="modalOrderStatus" class="font-bold px-2.5 py-0.5 rounded-md text-[11px]"></span>
                </div>
                <div class="flex items-center justify-between text-xs">
                    <span class="text-slate-500">Waktu Pengambilan</span>
                    <span class="font-bold text-slate-800">Istirahat Pertama</span>
                </div>
            </div>

            <hr class="border-slate-100">

            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-700">Total Pembayaran</span>
                <span id="modalTotalPrice" class="text-base font-extrabold text-[#59142b]"></span>
            </div>

            <button onclick="closeHistoryDetailModal()"
                class="w-full bg-[#59142b] text-white text-xs font-bold py-3 rounded-xl hover:opacity-90 transition">
                Tutup
            </button>
        </div>
    </div>

    <script>
        function openHistoryDetail(orderId, date, status, total) {
            document.getElementById('modalOrderId').innerText = orderId;
            document.getElementById('modalOrderDate').innerText = date;
            document.getElementById('modalTotalPrice').innerText = total;

            const statusEl = document.getElementById('modalOrderStatus');
            statusEl.innerText = status;

            if (status === 'Selesai') {
                statusEl.className = 'font-bold px-2.5 py-0.5 rounded-md text-[11px] bg-emerald-100 text-emerald-800';
            } else {
                statusEl.className = 'font-bold px-2.5 py-0.5 rounded-md text-[11px] bg-rose-100 text-rose-800';
            }

            document.getElementById('historyDetailModal').classList.remove('hidden');
        }

        function closeHistoryDetailModal() {
            document.getElementById('historyDetailModal').classList.add('hidden');
        }
    </script>
@endsection