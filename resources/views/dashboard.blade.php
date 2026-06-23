<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SmartLocker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        ::-webkit-scrollbar { display: none; }
        * { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#0A4DD6] text-white font-sans flex h-screen overflow-hidden antialiased selection:bg-yellow-400 selection:text-[#0A4DD6]" 
      x-data="{ 
          slideOpen: false, detailLoker: '', detailNama: '', detailStatus: '', isSelesai: false, 
          addLokerOpen: false, 
          editLokerOpen: false, editLokerId: '', editNomorLoker: '', editLokasi: '' 
      }">

    <aside class="w-64 bg-[#083CB0] border-r border-blue-500 flex flex-col h-full overflow-y-auto z-20 shadow-2xl shrink-0">
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
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full bg-[#0A4DD6] relative">
        
        <div class="bg-[#0A4DD6] border-b border-blue-500 relative z-10 shadow-sm shrink-0">
            <div class="flex items-center justify-between px-8 py-5">
                <div class="relative w-96">
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Cari loker atau pengguna..." class="w-full pl-12 pr-4 py-2 bg-white text-gray-900 rounded-full focus:ring-2 focus:ring-yellow-400 focus:outline-none border-none text-sm shadow-inner placeholder-gray-400 font-medium">
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-4 text-sm font-medium text-blue-100 hidden md:flex">
                        <button class="flex items-center gap-1 hover:text-yellow-400 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg> Urutkan</button>
                        <button class="flex items-center gap-1 hover:text-yellow-400 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg> Filter</button>
                        <span class="text-blue-400">|</span>
                        <span class="font-bold text-white tracking-wide">{{ Auth::user()->name ?? 'Riandra Fajar' }}</span>
                    </div>
                    
                    <button @click="addLokerOpen = true" class="bg-yellow-400 text-[#0A4DD6] px-6 py-2.5 rounded-full text-sm font-extrabold flex items-center gap-2 hover:bg-yellow-300 transition shadow-lg transform hover:scale-105">
                        <span>+</span> Tambah Loker
                    </button>
                </div>
            </div>

            <div class="px-8 pb-6 pt-2 flex flex-wrap items-end justify-between gap-6">
                <div class="w-64">
                    <h2 class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Statistik Penggunaan
                    </h2>
                    <div id="usageChart" class="w-full -ml-3"></div>
                </div>

                <div class="flex gap-10 md:gap-16 items-center">
                    <div class="text-center">
                        <div class="text-5xl font-extrabold text-white mb-1 drop-shadow-md">68%</div>
                        <div class="text-sm text-yellow-400 font-bold tracking-wide">Loker Terpakai</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">53</div>
                        <div class="text-sm text-blue-200 font-medium">Loker Aktif<br>hari ini</div>
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">27</div>
                        <div class="text-sm text-blue-200 font-medium">Penyewaan<br>Selesai</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-x-auto overflow-y-hidden p-8 relative">
            <div class="absolute -right-20 -bottom-20 w-[600px] h-[600px] bg-white opacity-5 pointer-events-none" style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;"></div>

            <div class="flex gap-6 min-w-max h-full relative z-10">
                
                <div class="w-80 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5 shrink-0">
                        <h3 class="text-lg font-extrabold text-yellow-400 uppercase tracking-wider">Tersedia</h3>
                        <span class="bg-[#083CB0] text-yellow-400 px-3 py-1 rounded-full text-xs font-bold shadow-inner">Tersedia &uarr;&darr;</span>
                    </div>
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2 pb-10">
                        
                        @forelse ($lokersTersedia as $loker)
                            @if ($loker->status == 'available')
                                <div @click="slideOpen = true; detailLoker = 'Loker {{ $loker->locker_number }}'; detailNama = 'Belum Ada'; detailStatus = 'Tersedia'; isSelesai = true"
                                     class="bg-white p-5 rounded-2xl shadow-lg border-b-4 border-[#083CB0] cursor-pointer text-gray-800 transition-transform hover:-translate-y-1">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-black text-xl text-[#0A4DD6]">{{ $loker->locker_number }}</h4>
                                        
                                        <div class="relative" x-data="{ menuOpen: false }">
                                            <button @click.stop="menuOpen = !menuOpen" @click.away="menuOpen = false" class="text-gray-400 hover:text-[#0A4DD6] px-2 py-1 bg-gray-50 rounded hover:bg-blue-50 transition">⋮</button>
                                            
                                            <div x-show="menuOpen" style="display: none;" class="absolute right-0 mt-2 w-32 bg-white rounded-xl shadow-xl py-2 z-50 border border-gray-100">
                                                <button @click.stop="editLokerOpen = true; editLokerId = '{{ $loker->id }}'; editNomorLoker = '{{ $loker->locker_number }}'; editLokasi = '{{ $loker->location }}'; menuOpen = false" 
                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 font-bold hover:text-[#0A4DD6] hover:bg-blue-50 transition">
                                                    Edit Loker
                                                </button>
                                                <form action="{{ route('loker.destroy', $loker->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus Loker {{ $loker->locker_number }} secara permanen?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button @click.stop type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-500 font-bold hover:text-red-600 hover:bg-red-50 transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-5 font-medium leading-relaxed">{{ $loker->location }}</p>
                                    <div class="flex justify-between items-center text-xs font-bold text-gray-500">
                                        <span class="flex items-center gap-1 bg-gray-100 rounded-lg px-3 py-1.5"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Standby</span>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="bg-blue-800/50 p-5 rounded-2xl border border-blue-500 text-center">
                                <p class="text-sm text-blue-200">Belum ada loker yang tersedia.</p>
                            </div>
                        @endforelse

                    </div>
                </div>

                <div class="w-80 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5 shrink-0">
                        <h3 class="text-lg font-extrabold text-yellow-400 uppercase tracking-wider">Sedang Disewa</h3>
                        <span class="bg-[#083CB0] text-yellow-400 px-3 py-1 rounded-full text-xs font-bold shadow-inner">17 &uarr;&darr;</span>
                    </div>
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2 pb-10">
                        
                        <div @click="slideOpen = true; detailLoker = 'Loker B-05'; detailNama = 'Muhammad Nizam'; detailStatus = 'Aktif - Sisa 2 Jam'; isSelesai = false"
                             class="bg-yellow-400 p-5 rounded-2xl shadow-xl border border-yellow-300 text-[#0A4DD6] cursor-pointer">
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
                                <span class="flex items-center gap-1 bg-white rounded-lg px-3 py-1.5 shadow-sm"><span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> Sisa 2 Jam</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-80 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5 shrink-0">
                        <h3 class="text-lg font-extrabold text-white uppercase tracking-wider">Selesai Hari Ini</h3>
                        <span class="bg-[#083CB0] text-blue-200 px-3 py-1 rounded-full text-xs font-bold shadow-inner">13 &uarr;&darr;</span>
                    </div>
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2 pb-10">
                        <div @click="slideOpen = true; detailLoker = 'Loker A-10'; detailNama = 'Anonim'; detailStatus = 'Selesai'; isSelesai = true" 
                             class="bg-[#083CB0] p-5 rounded-2xl shadow-inner border border-blue-500 opacity-80 cursor-pointer hover:opacity-100 transition-opacity">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-bold text-lg text-blue-200 line-through">Loker A-10</h4>
                            </div>
                            <p class="text-sm text-blue-300 font-medium">Sewa diakhiri pukul 14:30 WIB.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div x-show="slideOpen" style="display: none;" class="fixed inset-0 overflow-hidden z-40" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div class="absolute inset-0 overflow-hidden">
                <div x-show="slideOpen" x-transition.opacity.duration.300ms @click="slideOpen = false" class="absolute inset-0 bg-gray-900 bg-opacity-70 transition-opacity"></div>
                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                    <div x-show="slideOpen" x-transition:enter="transform transition ease-in-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="w-screen max-w-md">
                        <div class="h-full flex flex-col bg-white shadow-2xl overflow-y-scroll text-gray-800">
                            <div class="p-6 bg-[#0A4DD6] flex items-center justify-between">
                                <h2 class="text-2xl font-black text-yellow-400" x-text="detailLoker"></h2>
                                <button @click="slideOpen = false" class="text-white hover:text-yellow-400 focus:outline-none">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>
                            <div class="p-6 flex-1">
                                <div class="mb-8">
                                    <p class="text-sm text-gray-500 font-bold uppercase mb-2">Informasi Penyewa</p>
                                    <div class="flex items-center gap-4 bg-gray-50 p-4 rounded-xl border">
                                        <div class="w-12 h-12 bg-blue-100 text-[#0A4DD6] rounded-full flex items-center justify-center font-black text-xl" x-text="detailNama.charAt(0)"></div>
                                        <div>
                                            <p class="font-bold text-lg text-gray-900" x-text="detailNama"></p>
                                            <p class="text-sm text-gray-500 font-medium" x-text="detailStatus"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-8" x-show="!isSelesai">
                                    <p class="text-sm text-gray-500 font-bold uppercase mb-2">Autentikasi Biometrik</p>
                                    <div class="border-2 border-dashed border-gray-300 rounded-xl h-48 flex flex-col items-center justify-center bg-gray-50 relative overflow-hidden group cursor-pointer hover:border-[#0A4DD6] transition-colors">
                                        <svg class="w-12 h-12 text-gray-400 group-hover:text-[#0A4DD6] mb-3 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8v2a4 4 0 004 4h10a4 4 0 004-4V8M5 12h14m-7 4v4m-4 0h8"></path></svg>
                                        <span class="text-sm font-bold text-gray-500 group-hover:text-[#0A4DD6]">Buka Kamera & Pindai Wajah</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="addLokerOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="addLokerOpen" x-transition.opacity.duration.300ms @click="addLokerOpen = false" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="addLokerOpen" 
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                     class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-2 border-blue-100">
                    
                    <div class="bg-[#0A4DD6] px-6 py-4 flex justify-between items-center border-b border-blue-600">
                        <h3 class="text-xl font-black text-yellow-400 uppercase tracking-widest">Tambah Loker Baru</h3>
                        <button @click="addLokerOpen = false" class="text-white hover:text-yellow-400 transition transform hover:rotate-90">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    <form action="{{ route('loker.store') }}" method="POST">
                        @csrf
                        <div class="bg-white px-6 pt-6 pb-6 space-y-5 text-gray-800">
                            <div>
                                <label for="nomor_loker" class="block text-sm font-extrabold text-[#0A4DD6] mb-1.5 uppercase">Nomor Loker</label>
                                <input type="text" id="nomor_loker" name="nomor_loker" placeholder="Contoh: A-03" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-[#0A4DD6] focus:ring focus:ring-[#0A4DD6] focus:ring-opacity-30 transition-all font-semibold">
                            </div>
                            <div>
                                <label for="lokasi" class="block text-sm font-extrabold text-[#0A4DD6] mb-1.5 uppercase">Lokasi Gedung / Lantai</label>
                                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Gedung A Lantai 1" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-[#0A4DD6] focus:ring focus:ring-[#0A4DD6] focus:ring-opacity-30 transition-all font-semibold">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-4 flex flex-row-reverse gap-3 border-t border-gray-200">
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-6 py-2.5 bg-yellow-400 text-base font-extrabold text-[#0A4DD6] shadow-md hover:bg-yellow-300 focus:outline-none transition-all transform hover:scale-105">Simpan Data</button>
                            <button type="button" @click="addLokerOpen = false" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl border-2 border-gray-300 px-6 py-2.5 bg-white text-base font-bold text-gray-600 shadow-sm hover:bg-gray-50 hover:text-gray-900 focus:outline-none transition-all">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="editLokerOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="editLokerOpen" x-transition.opacity.duration.300ms @click="editLokerOpen = false" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="editLokerOpen" 
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                     class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-2 border-green-500">
                    
                    <div class="bg-green-500 px-6 py-4 flex justify-between items-center border-b border-green-600">
                        <h3 class="text-xl font-black text-white uppercase tracking-widest">Edit Data Loker</h3>
                        <button @click="editLokerOpen = false" class="text-white hover:text-green-200 transition transform hover:rotate-90">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    <form :action="'/loker/' + editLokerId" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="bg-white px-6 pt-6 pb-6 space-y-5 text-gray-800">
                            <div>
                                <label class="block text-sm font-extrabold text-green-600 mb-1.5 uppercase">Nomor Loker</label>
                                <input type="text" name="nomor_loker" x-model="editNomorLoker" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-30 transition-all font-semibold">
                            </div>
                            <div>
                                <label class="block text-sm font-extrabold text-green-600 mb-1.5 uppercase">Lokasi Gedung / Lantai</label>
                                <input type="text" name="lokasi" x-model="editLokasi" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-30 transition-all font-semibold">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-4 flex flex-row-reverse gap-3 border-t border-gray-200">
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-6 py-2.5 bg-green-500 text-base font-extrabold text-white shadow-md hover:bg-green-600 focus:outline-none transition-all transform hover:scale-105">Perbarui Data</button>
                            <button type="button" @click="editLokerOpen = false" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl border-2 border-gray-300 px-6 py-2.5 bg-white text-base font-bold text-gray-600 shadow-sm hover:bg-gray-50 hover:text-gray-900 focus:outline-none transition-all">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{ name: 'Penyewaan', data: [12, 19, 15, 25, 22, 30] }],
                chart: { 
                    type: 'bar', height: 120, toolbar: { show: false },
                    animations: { enabled: true, easing: 'easeinout', speed: 800 }
                },
                plotOptions: { bar: { columnWidth: '50%', borderRadius: 3, colors: { ranges: [{ from: 0, to: 100, color: '#fbbf24' }] } } },
                dataLabels: { enabled: false },
                xaxis: { 
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                    labels: { style: { colors: '#bfdbfe', fontSize: '10px', fontWeight: 700, cssClass: 'uppercase tracking-wider' } },
                    axisBorder: { show: false }, axisTicks: { show: false }
                },
                yaxis: { show: false },
                grid: { show: false, padding: { top: 0, right: 0, bottom: -10, left: -10 } },
                tooltip: { theme: 'light', x: { show: false }, y: { title: { formatter: function () { return 'Total:' } } } }
            };
            var chart = new ApexCharts(document.querySelector("#usageChart"), options);
            chart.render();
        });
    </script>
</body>
</html>