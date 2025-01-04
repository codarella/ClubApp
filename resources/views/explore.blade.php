<x-layout>
    <x-slot:heading>Explore</x-slot:heading>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-6">
        <h2 class="text-xl font-bold text-teal-400 mb-4">Looking for something new?</h2>
        <p class="text-gray-300">Explore various clubs and find the ones that interest you.</p>
        <!-- Add more content here as needed -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($clubs as $club)
                <x-club-card :club="$club" />
            @endforeach
        </div>
    </main>
</x-layout>