<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-[#0A4DD6] border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-wider hover:bg-[#083CB0] focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-white transition-all duration-200 transform hover:scale-[1.02] shadow-md']) }}>
    {{ $slot }}
</button>
