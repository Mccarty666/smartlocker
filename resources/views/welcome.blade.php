<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartLocker - Penyimpanan Aman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">
    
    <nav class="bg-[#0A4DD6] text-white p-6 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-black text-white tracking-widest uppercase">
                Smart<span class="text-yellow-400">Locker</span>
            </h1>
            <div class="space-x-6 font-bold text-sm hidden md:flex items-center">
                <a href="#" class="text-yellow-400 hover:text-white transition">Home</a>
                <a href="#" class="hover:text-yellow-400 transition">Tentang</a>
                <a href="#" class="hover:text-yellow-400 transition">Cara Kerja</a>
                <a href="#" class="hover:text-yellow-400 transition">F.A.Q</a>
                <span class="text-blue-300">|</span>
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-yellow-400 text-[#0A4DD6] px-5 py-2.5 rounded-full hover:bg-yellow-300 transition shadow-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-yellow-400 transition">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-white text-[#0A4DD6] px-5 py-2.5 rounded-full hover:bg-gray-100 transition shadow-sm">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-1 flex flex-col items-center justify-center text-center px-6 py-20 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-3xl">
            <h2 class="text-5xl md:text-6xl font-black text-[#0A4DD6] mb-6 leading-tight drop-shadow-sm">
                Ruang penyimpanan aman, <br> <span class="text-gray-800">di lingkungan kampus Anda.</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-600 mb-10 font-medium leading-relaxed">
                Temui SmartLocker, layanan peminjaman loker berbasis <span class="text-[#0A4DD6] font-bold">Face Recognition</span> untuk menjaga barang berharga Anda dengan aman dan praktis.
            </p>
            
            <div class="flex justify-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-yellow-400 text-[#0A4DD6] px-8 py-4 rounded-full text-lg font-extrabold shadow-xl hover:bg-yellow-300 transform hover:-translate-y-1 transition-all flex items-center gap-2">
                        Ke Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-yellow-400 text-[#0A4DD6] px-8 py-4 rounded-full text-lg font-extrabold shadow-xl hover:bg-yellow-300 transform hover:-translate-y-1 transition-all flex items-center gap-2">
                        Mulai Sekarang
                    </a>
                @endauth
            </div>
        </div>
    </main>
</body>
</html>