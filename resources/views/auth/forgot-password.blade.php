<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-extrabold text-[#0A4DD6]">Lupa Password?</h2>
        <p class="text-sm text-gray-500 mt-1">Jangan khawatir, kami akan mengirimkan link reset password ke email Anda.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-bold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-8">
            <x-primary-button class="w-full">
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>
        
        <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
                Ingat password Anda? 
                <a href="{{ route('login') }}" class="font-bold text-[#0A4DD6] hover:text-yellow-500 transition-colors">Kembali ke halaman login</a>
            </p>
        </div>
    </form>
</x-guest-layout>
