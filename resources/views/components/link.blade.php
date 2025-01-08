<!-- filepath: /c:/Users/OVERLORD/test_app/resources/views/components/link.blade.php -->
<a {{ $attributes->merge(['class' => 'text-gray-300 hover:text-teal-400']) }}>
    {{ $slot }}
</a>