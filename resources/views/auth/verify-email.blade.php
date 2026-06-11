<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-extrabold text-[#0A4DD6]">Verifikasi Email</h2>
        <p class="text-sm text-gray-500 mt-1">Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengklik link yang baru saja kami kirimkan? Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan ulang.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-400 text-green-700 rounded-r-lg text-sm font-medium">
            {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
        </div>
    @endif

    <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <x-primary-button class="w-full sm:w-auto">
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm font-semibold text-[#0A4DD6] hover:text-yellow-500 transition-colors underline">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
