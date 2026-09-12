@extends('layouts.app')

@section('content')
    <div class="space-y-6 max-w-6xl mx-auto pb-10">

        <!-- Header / Title -->
        <div class="space-y-1">
            <div class="flex items-center gap-3">
                <a href="{{ url()->previous() }}"
                    class="w-9 h-9 rounded-full bg-[#59142b] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-[#59142b]">Pembayaran</h1>
            </div>
            <p class="text-sm text-slate-500 pl-12">Tinjau detail pesanan Anda dan pilih waktu pengambilan.</p>
        </div>

        <!-- Main Grid Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- Left Column: Detail & Notes (Gunakan h-full flex flex-col) -->
            <div class="lg:col-span-7 flex flex-col h-full space-y-6">

                <!-- Detail Pesanan Card (Beri flex-1 agar menarik ke bawah) -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm space-y-4 flex-1 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center gap-2.5 pb-2 border-b border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#59142b]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h2 class="text-base font-bold text-slate-800">Detail Pesanan</h2>
                        </div>

                        <!-- Item 1 -->
                        <div class="flex items-start justify-between gap-4 py-2 border-b border-slate-100 last:border-0">
                            <div class="flex items-start gap-3.5">
                                <img src="{{ asset('images/Geprek.png') }}" alt="Ayam Geprek"
                                    class="w-16 h-16 rounded-xl object-cover shrink-0">
                                <div class="pt-0.5">
                                    <h3 class="text-base font-bold text-slate-800 leading-tight">Ayam Geprek</h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2">Ayam geprek dengan potongan ayam, telur,
                                        dan sayuran segar.</p>
                                </div>
                            </div>

                            <div class="flex flex-col items-end gap-2 shrink-0">
                                <span class="text-sm font-bold text-slate-900">Rp15.000</span>

                                <div class="flex items-center gap-2">
                                    <div
                                        class="flex items-center bg-[#59142b] text-white rounded-lg px-2 py-1 text-sm font-medium">
                                        <button class="px-1.5 hover:opacity-75 transition">-</button>
                                        <span class="px-2.5 text-sm font-bold">1</span>
                                        <button class="px-1.5 hover:opacity-75 transition">+</button>
                                    </div>

                                    <button class="p-1.5 text-slate-400 hover:text-red-600 transition" title="Hapus Item">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="flex items-start justify-between gap-4 py-2 border-b border-slate-100 last:border-0">
                            <div class="flex items-start gap-3.5">
                                <img src="{{ asset('images/Thai.png') }}" alt="Thai Tea"
                                    class="w-16 h-16 rounded-xl object-cover shrink-0">
                                <div>
                                    <h3 class="text-base font-bold text-slate-800">Thai Tea</h3>
                                    <p class="text-sm text-slate-500 line-clamp-2">Thai Tea creamy dan segar, cocok buat nemenin
                                        waktu istirahat!</p>
                                </div>
                            </div>

                            <div class="flex flex-col items-end gap-2 shrink-0">
                                <span class="text-sm font-bold text-slate-900">Rp8.000</span>

                                <div class="flex items-center gap-2">
                                    <div
                                        class="flex items-center bg-[#59142b] text-white rounded-lg px-2 py-1 text-sm font-medium">
                                        <button class="px-1.5 hover:opacity-75 transition">-</button>
                                        <span class="px-2.5 text-sm font-bold">1</span>
                                        <button class="px-1.5 hover:opacity-75 transition">+</button>
                                    </div>

                                    <button class="p-1.5 text-slate-400 hover:text-red-600 transition" title="Hapus Item">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes Card (Tambahkan shrink-0) -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm space-y-3 shrink-0">
                    <div class="flex items-center gap-2.5 pb-2 border-b border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#59142b]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <h2 class="text-base font-bold text-slate-800">Notes</h2>
                    </div>

                    <div class="relative">
                        <textarea rows="4" maxlength="150" placeholder="Tambahkan catatan khusus untuk pesanan Anda..."
                            class="w-full text-sm p-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#59142b] resize-none h-32"></textarea>
                        <span class="absolute bottom-3 right-3 text-xs text-slate-400">0/150</span>
                    </div>
                </div>

            </div>

            <!-- Right Column: Waktu Pengambilan & Ringkasan -->
            <div class="lg:col-span-5 flex flex-col h-full space-y-6">

                <!-- Waktu Pengambilan Card (Gunakan shrink-0) -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm space-y-4 shrink-0">
                    <div class="flex items-center gap-2.5 pb-2 border-b border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#59142b]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h2 class="text-base font-bold text-slate-800">Waktu Pengambilan</h2>
                    </div>

                    <!-- Opsi Pilihan Waktu -->
                    <div class="grid grid-cols-2 gap-3">

                        <label class="cursor-pointer">
                            <input type="radio" name="waktu_pengambilan" value="sebelum_masuk" class="peer hidden" checked>
                            <div
                                class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl transition duration-200 bg-[#ba798c]/30 text-slate-700 hover:bg-[#ba798c]/50 peer-checked:bg-[#59142b] peer-checked:text-white peer-checked:shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs font-semibold text-center">Sebelum masuk</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="waktu_pengambilan" value="istirahat_1" class="peer hidden">
                            <div
                                class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl transition duration-200 bg-[#ba798c]/30 text-slate-700 hover:bg-[#ba798c]/50 peer-checked:bg-[#59142b] peer-checked:text-white peer-checked:shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs font-semibold text-center">Istirahat pertama</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="waktu_pengambilan" value="istirahat_2" class="peer hidden">
                            <div
                                class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl transition duration-200 bg-[#ba798c]/30 text-slate-700 hover:bg-[#ba798c]/50 peer-checked:bg-[#59142b] peer-checked:text-white peer-checked:shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs font-semibold text-center">Istirahat kedua</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="waktu_pengambilan" value="pulang_sekolah" class="peer hidden">
                            <div
                                class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl transition duration-200 bg-[#ba798c]/30 text-slate-700 hover:bg-[#ba798c]/50 peer-checked:bg-[#59142b] peer-checked:text-white peer-checked:shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs font-semibold text-center">Setelah pulang sekolah</span>
                            </div>
                        </label>

                    </div>
                </div>

                <!-- Ringkasan Card -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm space-y-4 flex-1 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center gap-2.5 pb-2 border-b border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#59142b]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <h2 class="text-base font-bold text-slate-800">Ringkasan</h2>
                        </div>

                        <!-- List Item Ringkasan -->
                        <div class="space-y-2 text-xs">
                            <div class="flex justify-between text-slate-600">
                                <span>Nasi Goreng Ayam (x1)</span>
                                <span class="font-semibold text-slate-800">Rp15.000</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Thai Tea (x1)</span>
                                <span class="font-semibold text-slate-800">Rp8.000</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Divider Total & Harga -->
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-700">Total Pembayaran</span>
                            <span class="text-base font-extrabold text-[#59142b]">Rp23.000</span>
                        </div>

                        <a href="{{ route('orders') }}"
                            class="w-full bg-[#59142b] hover:bg-[#430f20] text-white font-semibold py-3 px-4 rounded-xl shadow-md transition text-sm flex items-center justify-center gap-2">
                            <span>Pesan Sekarang</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection