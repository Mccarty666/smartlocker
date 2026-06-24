<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SmartLocker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.2); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.4); }
    </style>
</head>
<body class="bg-[#0A4DD6] text-white font-sans flex h-screen overflow-hidden antialiased selection:bg-yellow-400 selection:text-[#0A4DD6]" 
      x-data="{ 
          activeTab: 'dashboard', 
          slideOpen: false, detailLoker: '', detailNama: '', detailStatus: '', isSelesai: false, 
          addLokerOpen: false, 
          editLokerOpen: false, editLokerId: '', editNomorLoker: '', editLokasi: '',
          sewaLokerOpen: false, sewaLokerId: '', sewaNomorLoker: ''
      }">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#083CB0] border-r border-blue-500/30 flex flex-col h-full overflow-y-auto z-20 shadow-2xl shrink-0 relative">
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-blue-400/20 to-transparent pointer-events-none"></div>

        <div class="p-6 relative z-10">
            <div class="border-2 border-yellow-400 px-4 py-2 inline-block bg-[#0A4DD6] shadow-[0_0_15px_rgba(251,191,36,0.3)] rounded-lg">
                <h1 class="text-xl font-extrabold tracking-widest uppercase text-white">Smart<span class="text-yellow-400">Locker</span></h1>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-2 relative z-10">
            <a href="#" @click.prevent="activeTab = 'dashboard'" :class="activeTab === 'dashboard' ? 'bg-[#0A4DD6] border-l-4 border-yellow-400 text-yellow-400 shadow-md font-bold' : 'text-blue-100 hover:bg-[#0A4DD6] hover:text-white font-medium border-l-4 border-transparent'" class="flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="#" @click.prevent="activeTab = 'penyewaan'" :class="activeTab === 'penyewaan' ? 'bg-[#0A4DD6] border-l-4 border-yellow-400 text-yellow-400 shadow-md font-bold' : 'text-blue-100 hover:bg-[#0A4DD6] hover:text-white font-medium border-l-4 border-transparent'" class="flex items-center justify-between px-3 py-3 text-sm rounded-lg transition-all duration-200">
                <div class="flex items-center gap-3"><svg class="w-5 h-5" :class="activeTab === 'penyewaan' ? 'text-yellow-400' : 'text-blue-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> Penyewaan</div>
            </a>
            <a href="#" @click.prevent="activeTab = 'dataloker'" :class="activeTab === 'dataloker' ? 'bg-[#0A4DD6] border-l-4 border-yellow-400 text-yellow-400 shadow-md font-bold' : 'text-blue-100 hover:bg-[#0A4DD6] hover:text-white font-medium border-l-4 border-transparent'" class="flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" :class="activeTab === 'dataloker' ? 'text-yellow-400' : 'text-blue-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg> Data Loker
            </a>
            <a href="#" @click.prevent="activeTab = 'pengaturan'" :class="activeTab === 'pengaturan' ? 'bg-[#0A4DD6] border-l-4 border-yellow-400 text-yellow-400 shadow-md font-bold' : 'text-blue-100 hover:bg-[#0A4DD6] hover:text-white font-medium border-l-4 border-transparent'" class="flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" :class="activeTab === 'pengaturan' ? 'text-yellow-400' : 'text-blue-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Pengaturan
            </a>
        </nav>

        <div class="p-4 border-t border-blue-500/30 text-sm bg-[#083CB0] relative z-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 text-blue-100 hover:text-yellow-400 hover:bg-[#0A4DD6] rounded-lg transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full relative overflow-hidden bg-gradient-to-br from-[#0A4DD6] to-[#07369E]">
        
        <!-- ========================================== -->
        <!-- TAMPILAN KHUSUS MAHASISWA                  -->
        <!-- ========================================== -->
        @if(Auth::user()->role === 'student')
            <div class="flex flex-col h-full w-full absolute inset-0 p-8 overflow-y-auto custom-scrollbar">
                <div class="absolute w-[800px] h-[800px] bg-white opacity-5 pointer-events-none" style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; top: -10%; left: -10%;"></div>

                <div class="w-full max-w-6xl mx-auto py-4 relative z-10">
                    
                    @if(!Auth::user()->face_registered)
                        <div class="max-w-lg mx-auto mt-20" x-data="{ 
                            isUploading: false, 
                            progress: 0, 
                            statusText: 'Menunggu foto...',
                            simulasikanDaftar() {
                                this.isUploading = true;
                                this.statusText = 'Memindai matriks wajah...';
                                
                                setTimeout(() => { this.progress = 30; this.statusText = 'Mengekstrak fitur vektor...'; }, 1000);
                                setTimeout(() => { this.progress = 70; this.statusText = 'Mencocokkan anomali data...'; }, 2000);
                                setTimeout(() => { this.progress = 100; this.statusText = 'Biometrik tersimpan!'; 
                                    // Kirim data ke database setelah animasi selesai
                                    document.getElementById('form-biometrik').submit(); 
                                }, 3000);
                            }
                        }">
                            <div class="bg-white p-10 rounded-[2rem] shadow-2xl text-center border-4 border-dashed border-blue-200">
                                <div x-show="!isUploading">
                                    <div class="w-20 h-20 bg-blue-50 text-[#0A4DD6] rounded-full flex items-center justify-center mx-auto mb-6">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path></svg>
                                    </div>
                                    <h3 class="text-2xl font-black text-[#0A4DD6] mb-2">Pendaftaran Biometrik</h3>
                                    <p class="text-gray-500 mb-8 font-medium">Unggah foto wajah Anda dari depan untuk mengaktifkan fitur kunci digital otomatis.</p>
                                    <input type="file" accept="image/*" class="mb-6 w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-extrabold file:bg-blue-50 file:text-[#0A4DD6] hover:file:bg-blue-100 transition-colors cursor-pointer">
                                    <button @click="simulasikanDaftar()" class="w-full bg-yellow-400 text-[#0A4DD6] py-4 rounded-xl font-black hover:bg-yellow-300 transition shadow-lg transform hover:-translate-y-1">Proses Data Wajah</button>
                                </div>

                                <div x-show="isUploading" style="display: none;" class="py-10">
                                    <svg class="animate-spin h-14 w-14 text-[#0A4DD6] mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <p class="text-xl font-black text-[#0A4DD6]" x-text="statusText"></p>
                                    <div class="w-full bg-gray-100 rounded-full h-3 mt-6 overflow-hidden shadow-inner">
                                        <div class="bg-[#0A4DD6] h-3 rounded-full transition-all duration-300 relative" :style="`width: ${progress}%`">
                                            <div class="absolute top-0 left-0 w-full h-full bg-white/20 animate-pulse"></div>
                                        </div>
                                    </div>
                                    <p class="text-sm font-bold text-gray-400 mt-2" x-text="progress + '%'"></p>
                                </div>

                                <form id="form-biometrik" action="{{ route('biometrik.simpan') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                    @else
                        @isset($myRental)
                            <div class="text-center mb-10 mt-6">
                                <h2 class="text-xl text-blue-200 font-medium">Selamat datang,</h2>
                                <h1 class="text-4xl font-black text-white tracking-wide">{{ Auth::user()->name }}</h1>
                            </div>

                            <div class="max-w-md mx-auto bg-yellow-400 rounded-[2rem] p-10 shadow-2xl text-[#0A4DD6] relative overflow-hidden transform transition hover:scale-105 duration-300">
                                <div class="absolute -right-10 -top-10 text-yellow-300 opacity-50">
                                    <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div class="relative z-10 text-center">
                                    <h3 class="text-sm font-extrabold uppercase tracking-widest text-yellow-700 mb-2">Loker Anda Saat Ini</h3>
                                    <div class="text-7xl font-black mb-4 tracking-tighter drop-shadow-sm">{{ $myRental->locker->locker_number }}</div>
                                    <p class="font-bold text-lg mb-8 opacity-90"><svg class="w-5 h-5 inline -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $myRental->locker->location }}</p>

                                    <div class="bg-white rounded-2xl py-4 px-6 shadow-inner text-center mb-8"
                                         x-data="{
                                            endTime: {{ \Carbon\Carbon::parse($myRental->end_time)->timestamp * 1000 }},
                                            sisaText: 'Menghitung...',
                                            hitungMundur() {
                                                let now = new Date().getTime();
                                                let distance = this.endTime - now;
                                                if (distance <= 0) { this.sisaText = 'WAKTU HABIS!'; return; }
                                                let h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
                                                let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
                                                let s = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
                                                this.sisaText = h + ':' + m + ':' + s;
                                            }
                                         }" x-init="hitungMundur(); setInterval(() => hitungMundur(), 1000)">
                                        <p class="text-xs text-gray-500 font-bold uppercase mb-1">Sisa Waktu Sewa</p>
                                        <div class="text-3xl font-black font-mono text-red-600 flex justify-center items-center gap-3">
                                            <span class="w-3 h-3 rounded-full bg-red-500 animate-pulse"></span>
                                            <span x-text="sisaText"></span>
                                        </div>
                                    </div>

                                    <button onclick="alert('Memanggil API IoT untuk membuka kunci elektrik pada pintu loker {{ $myRental->locker->locker_number }}...')" class="w-full bg-[#0A4DD6] text-white py-4 rounded-xl text-lg font-black shadow-xl hover:bg-blue-900 transition flex items-center justify-center gap-2 group mb-3">
                                        <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                                        Buka Pintu Loker
                                    </button>
                                    
                                    <form action="{{ route('rental.selesai', $myRental->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengakhiri masa sewa loker ini sekarang?');">
                                        @csrf @method('PUT')
                                        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-xl text-sm font-bold shadow-md hover:bg-red-600 transition">Selesaikan Sewa</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 mb-10 flex flex-col md:flex-row justify-between items-center shadow-2xl mt-6">
                                <div class="text-center md:text-left mb-6 md:mb-0">
                                    <h2 class="text-3xl font-black text-white mb-2">Halo, {{ Auth::user()->name }}! 👋</h2>
                                    <p class="text-blue-200 font-medium text-lg">Pilih loker yang tersedia di bawah ini untuk mulai menyewa.</p>
                                </div>
                                <div class="hidden md:block">
                                    <div class="bg-[#0A4DD6] rounded-2xl p-5 border border-blue-400/30 text-center shadow-inner min-w-[160px]">
                                        <p class="text-xs text-blue-200 uppercase font-bold mb-1 tracking-widest">Tanggal</p>
                                        <p class="text-lg font-black text-yellow-400">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="relative z-10 w-full">
                                @if(isset($lokersTersedia) && $lokersTersedia->count() > 0)
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                        @foreach($lokersTersedia as $loker)
                                            <div class="bg-white p-6 rounded-[2rem] shadow-xl text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-yellow-400 border-2 border-transparent cursor-pointer group flex flex-col h-full"
                                                 @click="sewaLokerOpen = true; sewaLokerId = '{{ $loker->id }}'; sewaNomorLoker = '{{ $loker->locker_number }}'">
                                                <div class="flex-1">
                                                    <div class="w-16 h-16 bg-blue-50 text-[#0A4DD6] rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-[#0A4DD6] group-hover:text-white transition-colors shadow-sm">
                                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                                    </div>
                                                    <h4 class="font-black text-3xl text-[#0A4DD6] mb-2">{{ $loker->locker_number }}</h4>
                                                    <p class="text-sm text-gray-500 font-medium mb-6 flex items-center justify-center gap-1">
                                                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                                                        {{ $loker->location }}
                                                    </p>
                                                </div>
                                                <button class="w-full bg-yellow-400 text-[#0A4DD6] py-3.5 rounded-xl font-extrabold hover:bg-yellow-300 transition shadow-md transform group-hover:scale-[1.02]">Sewa Sekarang</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="bg-[#083CB0] border border-blue-400 border-dashed rounded-[2rem] p-10 shadow-2xl text-center max-w-lg mx-auto mt-10">
                                        <div class="w-20 h-20 bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg></div>
                                        <h3 class="text-xl font-black text-white mb-2">Semua Loker Penuh</h3>
                                        <p class="text-blue-200 font-medium">Mohon maaf, saat ini tidak ada loker yang tersedia untuk disewa.</p>
                                    </div>
                                @endif
                            </div>
                        @endisset
                    @endif

                </div>
            </div>
        @endif

        <!-- ========================================== -->
        <!-- TAMPILAN KHUSUS ADMIN (DESAIN BARU)        -->
        <!-- ========================================== -->
        @if(Auth::user()->role !== 'student')
            <div x-show="activeTab === 'dashboard'" x-transition.opacity.duration.300ms class="flex flex-col h-full w-full absolute inset-0">
                
                <!-- TOP NAVBAR -->
                <div class="px-8 py-5 border-b border-blue-500/30 flex justify-between items-center bg-[#0A4DD6]/50 backdrop-blur-sm z-20 shrink-0">
                    <div>
                        <h2 class="text-2xl font-black tracking-wide">Overview Administrator</h2>
                        <p class="text-sm text-blue-200">Manajemen loker dan pemantauan sistem</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="relative w-64 md:w-80">
                            <svg class="w-5 h-5 text-blue-300 absolute left-4 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" placeholder="Cari loker..." class="w-full pl-11 pr-4 py-2 bg-[#083CB0] text-white placeholder-blue-300 rounded-full focus:ring-2 focus:ring-yellow-400 focus:outline-none border border-blue-500/50 text-sm transition-all">
                        </div>
                        <button @click="addLokerOpen = true" class="bg-yellow-400 text-[#0A4DD6] px-6 py-2.5 rounded-full text-sm font-extrabold flex items-center gap-2 hover:bg-yellow-300 transition shadow-[0_0_15px_rgba(251,191,36,0.4)] transform hover:-translate-y-0.5">
                            <span>+</span> Tambah Loker
                        </button>
                    </div>
                </div>

                <!-- MAIN CONTENT AREA (SCROLLABLE) -->
                <div class="flex-1 overflow-y-auto p-8 relative z-10 custom-scrollbar">
                    <div class="max-w-7xl mx-auto space-y-8">
                        
                        <!-- ROW 1: STATISTIC CARDS (Diubah menjadi 3 Kolom) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Card 1 -->
                            <div class="bg-white rounded-2xl p-6 shadow-xl flex items-center gap-5 transform transition hover:-translate-y-1">
                                <div class="w-14 h-14 rounded-full bg-blue-100 text-[#0A4DD6] flex items-center justify-center shrink-0">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-1">Tersedia</p>
                                    <h4 class="text-3xl font-black text-gray-800">{{ $lokersTersedia->count() ?? 0 }}</h4>
                                </div>
                            </div>
                            
                            <!-- Card 2 -->
                            <div class="bg-yellow-400 rounded-2xl p-6 shadow-xl flex items-center gap-5 transform transition hover:-translate-y-1">
                                <div class="w-14 h-14 rounded-full bg-yellow-300 text-[#0A4DD6] flex items-center justify-center shrink-0">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <div class="text-[#0A4DD6]">
                                    <p class="text-sm font-bold uppercase tracking-wider mb-1 opacity-80">Digunakan</p>
                                    <h4 class="text-3xl font-black">{{ isset($rentalsAktif) ? $rentalsAktif->count() : 0 }}</h4>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="bg-[#083CB0] rounded-2xl p-6 shadow-xl flex items-center gap-5 border border-blue-400/20 transform transition hover:-translate-y-1">
                                <div class="w-14 h-14 rounded-full bg-blue-900/50 text-green-400 flex items-center justify-center shrink-0">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-blue-200 uppercase tracking-wider mb-1">Selesai Hari Ini</p>
                                    <h4 class="text-3xl font-black text-white">{{ isset($rentalsSelesai) ? $rentalsSelesai->count() : 0 }}</h4>
                                </div>
                            </div>
                        </div>

                        <!-- ROW 2: KANBAN BOARDS -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 h-[calc(100vh-280px)]">
                            
                            <!-- KANBAN: TERSEDIA -->
                            <div class="bg-[#083CB0]/60 backdrop-blur-md rounded-[2rem] p-6 flex flex-col shadow-2xl border border-blue-400/20 relative overflow-hidden">
                                <div class="flex justify-between items-center mb-6 z-10">
                                    <h3 class="text-lg font-black text-white tracking-widest">TERSEDIA</h3>
                                    <span class="bg-white/10 text-white px-3 py-1 rounded-full text-xs font-bold">{{ $lokersTersedia->count() ?? 0 }} Loker</span>
                                </div>
                                <div class="flex-1 overflow-y-auto space-y-4 pr-2 pb-4 z-10 custom-scrollbar">
                                    @isset($lokersTersedia)
                                        @forelse ($lokersTersedia as $loker)
                                            <div class="bg-white p-5 rounded-2xl shadow-md border-b-4 border-gray-200 transition-all hover:-translate-y-1 hover:border-yellow-400 group">
                                                <div class="flex justify-between items-start mb-2">
                                                    <h4 class="font-black text-xl text-[#0A4DD6]">{{ $loker->locker_number }}</h4>
                                                    <div class="relative" x-data="{ menuOpen: false }">
                                                        <button @click.stop="menuOpen = !menuOpen" @click.away="menuOpen = false" class="text-gray-400 hover:text-[#0A4DD6] px-2 py-1 bg-gray-50 rounded-lg transition">⋮</button>
                                                        <div x-show="menuOpen" style="display: none;" class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-xl py-2 z-50 border border-gray-100">
                                                            <button @click.stop="sewaLokerOpen = true; sewaLokerId = '{{ $loker->id }}'; sewaNomorLoker = '{{ $loker->locker_number }}'; menuOpen = false" class="block w-full text-left px-4 py-2 text-sm text-green-600 font-bold hover:bg-green-50 transition border-b border-gray-100">&#9658; Sewakan Loker</button>
                                                            <button @click.stop="editLokerOpen = true; editLokerId = '{{ $loker->id }}'; editNomorLoker = '{{ $loker->locker_number }}'; editLokasi = '{{ $loker->location }}'; menuOpen = false" class="block w-full text-left px-4 py-2 text-sm text-gray-700 font-bold hover:text-[#0A4DD6] hover:bg-blue-50 transition">Edit Loker</button>
                                                            <form action="{{ route('loker.destroy', $loker->id) }}" method="POST" onsubmit="return confirm('Hapus loker ini secara permanen?');">
                                                                @csrf @method('DELETE')
                                                                <button @click.stop type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-500 font-bold hover:text-red-600 hover:bg-red-50 transition">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-sm text-gray-500 mb-4 font-medium flex items-center gap-1"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> {{ $loker->location }}</p>
                                                <button @click.stop="sewaLokerOpen = true; sewaLokerId = '{{ $loker->id }}'; sewaNomorLoker = '{{ $loker->locker_number }}'" class="w-full bg-gray-50 text-[#0A4DD6] py-2 rounded-xl text-sm font-bold group-hover:bg-[#0A4DD6] group-hover:text-white transition-colors">Sewakan Cepat</button>
                                            </div>
                                        @empty
                                            <div class="flex flex-col items-center justify-center h-40 text-blue-200/50">
                                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                                <span class="text-sm font-medium">Kosong</span>
                                            </div>
                                        @endforelse
                                    @endisset
                                </div>
                            </div>

                            <!-- KANBAN: SEDANG DISEWA -->
                            <div class="bg-[#083CB0]/60 backdrop-blur-md rounded-[2rem] p-6 flex flex-col shadow-2xl border border-blue-400/20 relative overflow-hidden">
                                <div class="flex justify-between items-center mb-6 z-10">
                                    <h3 class="text-lg font-black text-yellow-400 tracking-widest">DISEWA</h3>
                                    <span class="bg-yellow-400 text-[#0A4DD6] px-3 py-1 rounded-full text-xs font-bold shadow-md">{{ isset($rentalsAktif) ? $rentalsAktif->count() : 0 }} Aktif</span>
                                </div>
                                <div class="flex-1 overflow-y-auto space-y-4 pr-2 pb-4 z-10 custom-scrollbar">
                                    @isset($rentalsAktif)
                                        @forelse ($rentalsAktif as $rental)
                                            <div class="bg-yellow-400 p-5 rounded-2xl shadow-lg border border-yellow-300 text-[#0A4DD6] transition-transform hover:-translate-y-1">
                                                <div class="flex justify-between items-center mb-3">
                                                    <h4 class="font-black text-2xl">{{ $rental->locker->locker_number ?? 'Terhapus' }}</h4>
                                                    <!-- Live Timer Badge -->
                                                    <div class="bg-white/90 rounded-lg px-2.5 py-1 text-xs font-black text-red-600 shadow-sm flex items-center gap-1.5" x-data="{ endTime: {{ \Carbon\Carbon::parse($rental->end_time)->timestamp * 1000 }}, sisaText: '...', hitungMundur() { let now = new Date().getTime(); let distance = this.endTime - now; if (distance <= 0) { this.sisaText = 'HABIS'; return; } let h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2,'0'); let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2,'0'); let s = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2,'0'); this.sisaText = h+':'+m+':'+s; } }" x-init="hitungMundur(); setInterval(() => hitungMundur(), 1000)"> 
                                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span><span x-text="sisaText" class="font-mono"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex items-center gap-3 mb-4 bg-white/30 p-2.5 rounded-xl">
                                                    <div class="w-8 h-8 bg-[#0A4DD6] rounded-full flex items-center justify-center text-white text-xs font-bold shadow-inner">{{ substr($rental->renter_name, 0, 1) }}</div>
                                                    <span class="text-sm font-bold">{{ $rental->renter_name }}</span>
                                                </div>

                                                <form action="{{ route('rental.selesai', $rental->id) }}" method="POST" onsubmit="return confirm('Selesaikan penyewaan dan buka kunci loker?');">
                                                    @csrf @method('PUT')
                                                    <button type="submit" class="w-full bg-[#0A4DD6] text-white py-2.5 rounded-xl text-sm font-bold hover:bg-blue-900 transition shadow-md flex justify-center items-center gap-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg> Selesaikan Sewa
                                                    </button>
                                                </form>
                                            </div>
                                        @empty
                                            <div class="flex flex-col items-center justify-center h-40 text-blue-200/50">
                                                <span class="text-sm font-medium">Tidak ada penyewaan aktif</span>
                                            </div>
                                        @endforelse
                                    @endisset
                                </div>
                            </div>

                            <!-- KANBAN: SELESAI -->
                            <div class="bg-[#083CB0]/60 backdrop-blur-md rounded-[2rem] p-6 flex flex-col shadow-2xl border border-blue-400/20 relative overflow-hidden">
                                <div class="flex justify-between items-center mb-6 z-10">
                                    <h3 class="text-lg font-black text-white tracking-widest">SELESAI HARI INI</h3>
                                    <span class="bg-white/10 text-white px-3 py-1 rounded-full text-xs font-bold">{{ isset($rentalsSelesai) ? $rentalsSelesai->count() : 0 }} Riwayat</span>
                                </div>
                                <div class="flex-1 overflow-y-auto space-y-3 pr-2 pb-4 z-10 custom-scrollbar">
                                    @isset($rentalsSelesai)
                                        @forelse ($rentalsSelesai as $rental)
                                            <div class="bg-white/10 p-4 rounded-2xl border border-white/5 hover:bg-white/20 transition-colors cursor-default">
                                                <div class="flex justify-between items-center mb-1">
                                                    <h4 class="font-bold text-lg text-blue-100 line-through">{{ $rental->locker->locker_number ?? 'Terhapus' }}</h4>
                                                    <span class="text-xs font-bold text-blue-300 bg-blue-900/50 px-2 py-0.5 rounded">{{ \Carbon\Carbon::parse($rental->updated_at)->format('H:i') }}</span>
                                                </div>
                                                <p class="text-xs text-blue-200/70 font-medium">Disewa oleh <span class="text-white">{{ $rental->renter_name }}</span></p>
                                            </div>
                                        @empty
                                            <div class="flex flex-col items-center justify-center h-40 text-blue-200/50">
                                                <span class="text-sm font-medium">Riwayat kosong</span>
                                            </div>
                                        @endforelse
                                    @endisset
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL TAMBAH LOKER -->
            <div x-show="addLokerOpen" style="display: none;" class="fixed inset-0 z-[60] overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity" @click="addLokerOpen = false"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-100 relative z-50">
                        <div class="bg-[#0A4DD6] px-6 py-5 flex justify-between items-center">
                            <h3 class="text-xl font-black text-yellow-400 uppercase tracking-widest">Tambah Loker Baru</h3>
                            <button @click="addLokerOpen = false" class="text-white hover:text-yellow-400 transition transform hover:rotate-90"><svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                        </div>
                        <form action="{{ route('loker.store') }}" method="POST">
                            @csrf
                            <div class="px-8 pt-8 pb-8 space-y-6 text-gray-800">
                                <div><label class="block text-sm font-extrabold text-gray-700 mb-2 uppercase">Nomor Loker</label><input type="text" name="nomor_loker" placeholder="Contoh: A-01" required class="w-full px-5 py-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#0A4DD6] focus:ring-2 focus:ring-[#0A4DD6]/20 font-bold transition-all"></div>
                                <div><label class="block text-sm font-extrabold text-gray-700 mb-2 uppercase">Lokasi Gedung / Lantai</label><input type="text" name="lokasi" placeholder="Contoh: Gedung B Lantai 1" required class="w-full px-5 py-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-[#0A4DD6] focus:ring-2 focus:ring-[#0A4DD6]/20 font-bold transition-all"></div>
                            </div>
                            <div class="bg-gray-50 px-8 py-5 flex flex-row-reverse gap-3 border-t border-gray-100">
                                <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-8 py-3 bg-yellow-400 text-base font-extrabold text-[#0A4DD6] shadow-lg hover:bg-yellow-300 transition-all transform hover:scale-105">Simpan Data</button>
                                <button type="button" @click="addLokerOpen = false" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-8 py-3 bg-white text-base font-bold text-gray-500 shadow-sm border border-gray-200 hover:bg-gray-50 transition-all">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL EDIT LOKER -->
            <div x-show="editLokerOpen" style="display: none;" class="fixed inset-0 z-[60] overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity" @click="editLokerOpen = false"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-100 relative z-50">
                        <div class="bg-green-500 px-6 py-5 flex justify-between items-center">
                            <h3 class="text-xl font-black text-white uppercase tracking-widest">Edit Data Loker</h3>
                            <button @click="editLokerOpen = false" class="text-white hover:text-gray-200 transition transform hover:rotate-90"><svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                        </div>
                        <form :action="'/loker/' + editLokerId" method="POST">
                            @csrf @method('PUT')
                            <div class="px-8 pt-8 pb-8 space-y-6 text-gray-800">
                                <div><label class="block text-sm font-extrabold text-gray-700 mb-2 uppercase">Nomor Loker</label><input type="text" name="nomor_loker" x-model="editNomorLoker" required class="w-full px-5 py-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-500/20 font-bold transition-all"></div>
                                <div><label class="block text-sm font-extrabold text-gray-700 mb-2 uppercase">Lokasi Gedung / Lantai</label><input type="text" name="lokasi" x-model="editLokasi" required class="w-full px-5 py-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-500/20 font-bold transition-all"></div>
                            </div>
                            <div class="bg-gray-50 px-8 py-5 flex flex-row-reverse gap-3 border-t border-gray-100">
                                <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-8 py-3 bg-[#0A4DD6] text-base font-extrabold text-white shadow-lg hover:bg-blue-700 transition-all transform hover:scale-105">Simpan Perubahan</button>
                                <button type="button" @click="editLokerOpen = false" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-8 py-3 bg-white text-base font-bold text-gray-500 shadow-sm border border-gray-200 hover:bg-gray-50 transition-all">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <!-- ========================================== -->
        <!-- MODAL SEWA LOKER (MAHASISWA & ADMIN)       -->
        <!-- ========================================== -->
        <div x-show="sewaLokerOpen" style="display: none;" class="fixed inset-0 z-[70] overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity" @click="sewaLokerOpen = false"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-4 border-yellow-400 relative z-50">
                    <div class="bg-yellow-400 px-6 py-5 flex justify-between items-center">
                        <h3 class="text-xl font-black text-[#0A4DD6] uppercase tracking-widest flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                            Sewa Loker <span x-text="sewaNomorLoker"></span>
                        </h3>
                        <button @click="sewaLokerOpen = false" class="text-[#0A4DD6] hover:text-white transition transform hover:rotate-90"><svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                    </div>
                    <form :action="'/loker/' + sewaLokerId + '/sewa'" method="POST">
                        @csrf
                        <div class="px-8 pt-8 pb-8 space-y-6 text-gray-800">
                            <div>
                                <label class="block text-sm font-extrabold text-gray-700 mb-2 uppercase">Nama Penyewa</label>
                                <input type="text" name="nama_penyewa" 
                                       value="{{ Auth::user()->role === 'student' ? Auth::user()->name : '' }}" 
                                       {{ Auth::user()->role === 'student' ? 'readonly' : '' }}
                                       placeholder="Contoh: Budi Santoso" required 
                                       class="w-full px-5 py-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 font-bold transition-all {{ Auth::user()->role === 'student' ? 'text-gray-500 cursor-not-allowed border-dashed' : '' }}">
                            </div>
                            <div>
                                <label class="block text-sm font-extrabold text-gray-700 mb-2 uppercase">Durasi Sewa (Jam)</label>
                                <input type="number" name="durasi_jam" value="1" min="1" max="24" required class="w-full px-5 py-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 font-bold transition-all">
                            </div>
                        </div>
                        <div class="bg-gray-50 px-8 py-5 flex flex-row-reverse gap-3 border-t border-gray-100">
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-8 py-3 bg-yellow-400 text-base font-extrabold text-[#0A4DD6] shadow-lg hover:bg-yellow-300 transition-all transform hover:scale-105">Mulai Sewa</button>
                            <button type="button" @click="sewaLokerOpen = false" class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl px-8 py-3 bg-white text-base font-bold text-gray-500 shadow-sm border border-gray-200 hover:bg-gray-50 transition-all">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- DUMMY SUB-PAGES -->
        <div x-show="activeTab !== 'dashboard'" style="display:none;" class="flex-1 flex items-center justify-center text-center p-8 z-10">
            <div class="bg-[#083CB0]/80 backdrop-blur-md p-10 rounded-[2rem] border border-blue-400/20 shadow-2xl max-w-md w-full">
                <div class="w-20 h-20 bg-blue-100 text-[#0A4DD6] rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner rotate-3"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg></div>
                <h2 class="text-2xl font-black text-white mb-2 uppercase tracking-widest">Modul <span x-text="activeTab"></span></h2>
                <p class="text-blue-200 mb-8 font-medium">Fitur ini sedang dalam tahap pengembangan dan akan dirilis pada pembaruan sistem berikutnya.</p>
                <button @click="activeTab = 'dashboard'" class="w-full px-6 py-3 bg-yellow-400 text-[#0A4DD6] font-extrabold rounded-xl hover:bg-yellow-300 transition shadow-lg">Kembali ke Dashboard</button>
            </div>
        </div>

    </main>

</body>
</html>