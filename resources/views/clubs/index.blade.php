<!-- filepath: /c:/Users/OVERLORD/test_app/resources/views/clubs/index.blade.php -->
<x-layout>
    <x-slot:heading>Explore</x-slot:heading>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-6">
        <h2 class="text-xl font-bold text-teal-400 mb-4">Looking for something new?</h2>
        
        <!-- Search Form -->
        <form method="GET" action="/explore" class="mb-6 flex items-center justify-end">
            <i class="fas fa-search text-teal-400 mr-2"></i>
            <input type="text" name="search" placeholder="Search for a club" class="bg-gray-800 text-gray-300 p-2 rounded-lg w-48" value="{{ request('search') }}">
            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg ml-4 hover:bg-teal-600">Search</button>
        </form>

        @auth
            <div class="mb-6 flex justify-end">
                <x-button href="/explore/create">Create Club</x-button>
            </div>
        @endauth

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($clubs as $club)
                <x-club-card :club="$club" />
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $clubs->links() }}
        </div>
    </main>
</x-layout>