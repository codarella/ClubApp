<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600']) }}>
    {{ $slot }}
</button>
{{-- Additional attributes or slots can be added here --}}