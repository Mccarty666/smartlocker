<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartLocker - Peminjaman Loker Kampus</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen bg-[#0A4DD6] text-white font-sans selection:bg-yellow-400 selection:text-blue-900">

    <nav class="container mx-auto px-6 py-8 flex items-center justify-between">
        <div class="border-4 border-yellow-400 px-4 py-1">
            <h1 class="text-3xl font-extrabold tracking-widest uppercase">
                Smart<span class="text-yellow-400">Locker</span>
            </h1>
        </div>

        <div class="hidden md:flex space-x-8 text-yellow-400 font-bold text-sm uppercase tracking-wide">
            <a href="#" class="hover:text-white transition">Home</a>
            <a href="#" class="hover:text-white transition">Tentang</a>
            <a href="#" class="hover:text-white transition">Cara Kerja</a>
            <a href="#" class="hover:text-white transition">F.A.Q</a>
        </div>
    </nav>

    <main class="container mx-auto px-6 mt-12 md:mt-24 flex flex-col md:flex-row items-center relative">
        
        <div class="md:w-1/2 z-10 text-center md:text-left">
            <h2 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                Ruang penyimpanan aman, <br>
                <span class="text-yellow-400">di lingkungan kampus Anda.</span>
            </h2>
            <p class="text-lg md:text-xl text-blue-100 mb-10 max-w-lg mx-auto md:mx-0 opacity-90">
                Temui SmartLocker, layanan peminjaman loker berbasis Face Recognition untuk menjaga barang berharga Anda dengan aman dan praktis.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-yellow-400 text-[#0A4DD6] font-bold rounded-full shadow-lg hover:bg-yellow-300 transform hover:scale-105 transition duration-300 w-full sm:w-auto text-center">
                            Ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-8 py-3 bg-[#A855F7] text-white font-bold rounded-full shadow-lg hover:bg-[#9333EA] transform hover:scale-105 transition duration-300 w-full sm:w-auto text-center tracking-wider">
                            LOGIN
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-8 py-3 bg-transparent border-2 border-yellow-400 text-yellow-400 font-bold rounded-full hover:bg-yellow-400 hover:text-[#0A4DD6] transform hover:scale-105 transition duration-300 w-full sm:w-auto text-center tracking-wider">
                                REGISTER
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <div class="md:w-1/2 mt-16 md:mt-0 relative flex justify-center items-center">
            <div class="absolute bg-white w-[300px] h-[300px] md:w-[500px] md:h-[500px]" style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;"></div>
            
            <div class="relative z-10 grid grid-cols-2 gap-4 transform rotate-3">
                <div class="bg-yellow-400 w-24 h-32 md:w-32 md:h-48 rounded shadow-xl flex items-center justify-center border-l-8 border-[#0A4DD6]">
                    <span class="text-4xl md:text-6xl font-black text-[#0A4DD6] opacity-80">01</span>
                </div>
                <div class="bg-yellow-400 w-24 h-32 md:w-32 md:h-48 rounded shadow-xl flex items-center justify-center border-l-8 border-[#0A4DD6] mt-8">
                    <span class="text-4xl md:text-6xl font-black text-[#0A4DD6] opacity-80">02</span>
                </div>
            </div>
        </div>

    </main>

</body>
</html>