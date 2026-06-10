<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SmartLocker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Menyembunyikan scrollbar secara visual tapi fungsi scroll tetap berjalan */
        ::-webkit-scrollbar {
            display: none; /* Untuk browser Chrome, Safari, dan Opera */
        }
        * {
            -ms-overflow-style: none;  /* Untuk IE dan Edge */
            scrollbar-width: none;  /* Untuk Firefox */
        }
        
        /* Pola arsiran untuk bar chart (tetap dipertahankan) */
        .bg-stripes {
            background-image: linear-gradient(45deg, rgba(250, 204, 21, 0.4) 25%, transparent 25%, transparent 50%, rgba(250, 204, 21, 0.4) 50%, rgba(250, 204, 21, 0.4) 75%, transparent 75%, transparent);
            background-size: 8px 8px;
        }
    </style>
</head>
<body class="bg-[#0A4DD6] text-white font-sans flex h-screen overflow-hidden antialiased selection:bg-yellow-400 selection:text-[#0A4DD6]">

    <aside class="w-64 bg-[#083CB0] border-r border-blue-500 flex flex-col h-full overflow-y-auto z-20 shadow-2xl">
        <div class="p-6">
            <div class="border-2 border-yellow-400 px-3 py-1 inline-block bg-[#0A4DD6] shadow-md">
                <h1 class="text-xl font-extrabold tracking-widest uppercase text-white">
                    Smart<span class="text-yellow-400">Locker</span>
                </h1>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="#" class="flex items-center gap-3 px-3 py-3 text-sm font-bold rounded-lg bg-[#0A4DD6] border-l-4 border-yellow-400 text-yellow-400 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center justify-between px-3 py-3 text-sm font-medium rounded-lg text-blue-100 hover:bg-[#0A4DD6] hover:text-white transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Penyewaan
                </div>
                <span class="bg-yellow-400 text-[#0A4DD6] py-0.5 px-2 rounded-full text-xs font-bold shadow-sm">12</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-3 text-sm font-medium rounded-lg text-blue-100 hover:bg-[#0A4DD6] hover:text-white transition">
                <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Data Loker
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-3 text-sm font-medium rounded-lg text-blue-100 hover:bg-[#0A4DD6] hover:text-white transition">
                <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Pengaturan
            </a>
        </nav>

        <div class="p-4 border-t border-blue-500 text-sm bg-[#083CB0]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 text-blue-100 hover:text-yellow-400 hover:bg-[#0A4DD6] rounded-lg transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full bg-[#0A4DD6]">
        
        <div class="bg-[#0A4DD6] border-b border-blue-500 relative z-10 shadow-sm">
            <div class="flex items-center justify-between px-8 py-5">
                <div class="relative w-96">
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Cari loker atau pengguna..." class="w-full pl-12 pr-4 py-2 bg-white text-gray-900 rounded-full focus:ring-2 focus:ring-yellow-400 focus:outline-none border-none text-sm shadow-inner placeholder-gray-400 font-medium">
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-4 text-sm font-medium text-blue-100">
                        <button class="flex items-center gap-1 hover:text-yellow-400 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg> Urutkan</button>
                        <button class="flex items-center gap-1 hover:text-yellow-400 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg> Filter</button>
                        <span class="text-blue-400">|</span>
                        <span class="font-bold text-white tracking-wide">{{ Auth::user()->name ?? 'Riandra Fajar' }}</span>
                    </div>
                    <button class="bg-yellow-400 text-[#0A4DD6] px-6 py-2.5 rounded-full text-sm font-extrabold flex items-center gap-2 hover:bg-yellow-300 transition shadow-lg transform hover:scale-105">
                        <span>+</span> Tambah Loker
                    </button>
                </div>
            </div>

            <div class="px-8 pb-8 pt-2 flex items-end justify-between">
                <div>
                    <h2 class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Statistik Penggunaan
                    </h2>
                    <div class="flex items-end gap-3 h-24">
                        <div class="w-8 bg-yellow-400 h-3/4 rounded-t-md shadow-sm"></div>
                        <div class="w-8 border border-yellow-400 h-1/2 rounded-t-md bg-stripes"></div>
                        <div class="w-8 bg-yellow-400 h-full rounded-t-md shadow-sm"></div>
                        <div class="w-8 bg-yellow-400 h-2/3 rounded-t-md shadow-sm"></div>
                        <div class="w-8 border border-yellow-400 h-1/4 rounded-t-md bg-stripes"></div>
                        <div class="w-8 bg-yellow-400 h-5/6 rounded-t-md shadow-sm"></div>
                    </div>
                    <div class="flex gap-3 mt-3 text-xs text-blue-200 font-bold w-full justify-between uppercase tracking-wider">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                    </div>
                </div>

                <div class="flex gap-16 items-center">
                    <div class="text-center">
                        <div class="text-5xl font-extrabold text-white mb-1 drop-shadow-md">68%</div>
                        <div class="text-sm text-yellow-400 font-bold tracking-wide">Loker Terpakai</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">53</div>
                        <div class="text-sm text-blue-200 font-medium">Loker Aktif<br>hari ini</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">27</div>
                        <div class="text-sm text-blue-200 font-medium">Penyewaan<br>Selesai</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-x-auto p-8 relative">
            <div class="absolute -right-20 -bottom-20 w-[600px] h-[600px] bg-white opacity-5 pointer-events-none" style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;"></div>

            <div class="flex gap-6 min-w-max h-full relative z-10">
                
                <div class="w-80 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-extrabold text-yellow-400 uppercase tracking-wider">Tersedia</h3>
                        <span class="bg-[#083CB0] text-yellow-400 px-3 py-1 rounded-full text-xs font-bold shadow-inner">12 &uarr;&darr;</span>
                    </div>
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2">
                        <div class="bg-white p-5 rounded-2xl shadow-lg border-b-4 border-[#083CB0] hover:-translate-y-1 transition duration-300 cursor-pointer text-gray-800">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-black text-xl text-[#0A4DD6]">Loker A-01</h4>
                                <button class="text-gray-400 hover:text-[#0A4DD6]">⋮</button>
                            </div>
                            <p class="text-sm text-gray-500 mb-5 font-medium leading-relaxed">Loker ukuran medium di Gedung A Lantai 1 dekat pintu masuk.</p>
                            <div class="flex justify-between items-center text-xs font-bold text-gray-500">
                                <span class="flex items-center gap-1 bg-gray-100 rounded-lg px-3 py-1.5"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Standby</span>
                            </div>
                        </div>
                        
                        <div class="bg-white p-5 rounded-2xl shadow-lg border-b-4 border-[#083CB0] hover:-translate-y-1 transition duration-300 cursor-pointer text-gray-800">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-black text-xl text-[#0A4DD6]">Loker A-02</h4>
                                <button class="text-gray-400 hover:text-[#0A4DD6]">⋮</button>
                            </div>
                            <p class="text-sm text-gray-500 mb-5 font-medium leading-relaxed">Loker ukuran medium di Gedung A Lantai 1.</p>
                            <div class="flex justify-between items-center text-xs font-bold text-gray-500">
                                <span class="flex items-center gap-1 bg-gray-100 rounded-lg px-3 py-1.5"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Standby</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-80 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-extrabold text-yellow-400 uppercase tracking-wider">Sedang Disewa</h3>
                        <span class="bg-[#083CB0] text-yellow-400 px-3 py-1 rounded-full text-xs font-bold shadow-inner">17 &uarr;&darr;</span>
                    </div>
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2">
                        
                        <div class="bg-yellow-400 p-5 rounded-2xl shadow-xl border border-yellow-300 text-[#0A4DD6] cursor-pointer transform scale-[1.03] rotate-1">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-black text-xl">Loker B-05</h4>
                                <button class="text-[#0A4DD6] opacity-60 hover:opacity-100">⋮</button>
                            </div>
                            <p class="text-sm font-semibold mb-5 leading-relaxed">Disewa oleh mahasiswa M. Nizam. Berisi laptop dan buku.</p>
                            <div class="flex items-center gap-3 mb-5 bg-[#0A4DD6]/10 p-2 rounded-lg">
                                <div class="w-8 h-8 bg-[#0A4DD6] rounded-full flex items-center justify-center text-white text-xs font-bold shadow-inner">MN</div>
                                <span class="text-sm font-bold">Muhammad Nizam</span>
                            </div>
                            <div class="flex justify-between items-center text-xs font-bold">
                                <span class="flex items-center gap-1 bg-white rounded-lg px-3 py-1.5 shadow-sm"><svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Sisa 2 Jam</span>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-2xl shadow-lg border-b-4 border-[#083CB0] hover:-translate-y-1 transition duration-300 cursor-pointer text-gray-800">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-black text-xl text-[#0A4DD6]">Loker C-12</h4>
                                <button class="text-gray-400 hover:text-[#0A4DD6]">⋮</button>
                            </div>
                            <p class="text-sm text-gray-500 mb-5 font-medium leading-relaxed">Gedung Perpustakaan Lantai 2.</p>
                            <div class="flex items-center gap-3 mb-5 bg-gray-50 p-2 rounded-lg border border-gray-100">
                                <div class="w-8 h-8 bg-green-500 rounded-full text-white flex items-center justify-center text-xs font-bold shadow-inner">AS</div>
                                <span class="text-sm font-bold text-gray-700">Andi Saputra</span>
                            </div>
                            <div class="flex justify-between items-center text-xs font-bold text-gray-500">
                                <span class="flex items-center gap-1 bg-gray-100 rounded-lg px-3 py-1.5"><svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Sisa 45 Menit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-80 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-extrabold text-white uppercase tracking-wider">Selesai Hari Ini</h3>
                        <span class="bg-[#083CB0] text-blue-200 px-3 py-1 rounded-full text-xs font-bold shadow-inner">13 &uarr;&darr;</span>
                    </div>
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2">
                        <div class="bg-[#083CB0] p-5 rounded-2xl shadow-inner border border-blue-500 opacity-80 cursor-default">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-bold text-lg text-blue-200 line-through">Loker A-10</h4>
                            </div>
                            <p class="text-sm text-blue-300 font-medium">Sewa diakhiri pukul 14:30 WIB.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    
</body>
</html>