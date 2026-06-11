<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SmartLocker') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased selection:bg-yellow-400 selection:text-[#0A4DD6]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0A4DD6] relative overflow-hidden">
            <!-- Decorative Background Shapes -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-white opacity-5 pointer-events-none" style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-yellow-400 opacity-10 pointer-events-none" style="border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;"></div>

            <div class="mb-8 z-10">
                <a href="/">
                    <div class="border-2 border-yellow-400 px-4 py-2 bg-[#083CB0] shadow-lg">
                        <h1 class="text-2xl font-extrabold tracking-widest uppercase text-white">
                            Smart<span class="text-yellow-400">Locker</span>
                        </h1>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-2xl z-10 border-t-4 border-yellow-400">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
