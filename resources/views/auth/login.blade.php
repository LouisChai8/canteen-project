<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SEMAT Kantin Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8f6f7] min-h-screen flex items-center justify-center p-4 font-sans">
    <div class="bg-white w-full max-w-4xl rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row items-stretch">

        <!-- Form Left -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-between space-y-6">
            <div class="text-right text-xs text-slate-500">
                Belum punya akun? <a href="{{ route('register') }}"
                    class="font-bold text-slate-900 hover:underline">Daftar sekarang</a>
            </div>

            <div class="space-y-2">
                <h1 class="text-3xl font-extrabold text-[#59142b]">Masuk ke Akunmu</h1>
                <p class="text-xs text-slate-500">Masuk untuk melanjutkan memesan makanan di kantin SEMAT.</p>
            </div>

            @if ($errors->has('login'))
                <div class="p-3 rounded-xl bg-rose-100 text-rose-800 text-xs font-semibold">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email / Username</label>
                    <div class="relative">
                        <input type="text" name="email" value="{{ old('email') }}" required
                            placeholder="Masukkan Email atau Username"
                            class="w-full pl-10 pr-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#59142b]">
                        <div class="absolute left-3 top-3.5 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" required placeholder="Masukkan password"
                            class="w-full pl-10 pr-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#59142b]">
                        <div class="absolute left-3 top-3.5 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-[#59142b] text-white font-bold py-3 rounded-xl hover:opacity-90 transition text-xs tracking-wider">
                    MASUK &rarr;
                </button>
            </form>

            <div class="space-y-3">
                <div class="relative flex items-center justify-center">
                    <div class="border-t border-slate-200 w-full"></div>
                    <span class="bg-white px-3 text-[10px] text-slate-400 font-semibold absolute">atau masuk
                        dengan</span>
                </div>

                <div class="grid grid-cols-2 gap-3 pt-2">
                    <button
                        class="flex items-center justify-center gap-2 border border-slate-200 py-2.5 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition">
                        <svg class="w-4 h-4" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z" />
                            <path fill="#34A853"
                                d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.15C3.26 21.3 7.31 24 12 24z" />
                            <path fill="#FBBC05"
                                d="M5.28 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.39l3.99-3.15z" />
                            <path fill="#EA4335"
                                d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.31 0 3.26 2.7 1.29 6.61l3.99 3.15c.95-2.85 3.6-4.96 6.72-4.96z" />
                        </svg>
                        GOOGLE
                    </button>
                    <button
                        class="flex items-center justify-center gap-2 border border-slate-200 py-2.5 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition">
                        🎓 SEKOLAH
                    </button>
                </div>
            </div>
        </div>

        <!-- Banner Right (Image Background) -->
        <div class="w-full md:w-1/2 relative bg-[#4a1024] overflow-hidden min-h-[400px] md:min-h-full">
            <img src="{{ asset('images/auth-hero-login.png') }}" alt="SEMAT Kantin Sekolah"
                class="absolute inset-0 w-full h-full object-cover object-left">
        </div>

    </div>
</body>

</html>