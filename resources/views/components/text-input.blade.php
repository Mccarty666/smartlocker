@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-blue-200 focus:border-yellow-400 focus:ring-yellow-400 rounded-lg shadow-sm w-full py-2.5 px-3 text-gray-700 placeholder-gray-400 transition-colors duration-200']) }}>
