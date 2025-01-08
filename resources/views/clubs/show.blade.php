<x-layout>
    <div class="container mx-auto mt-8">
        <div class="bg-gray-800 text-gray-100 shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-teal-400 mb-4">{{ $club->name }}</h1>
            <p class="text-gray-300 mb-4">{{ $club->description }}</p>
            <div class="flex items-center mb-4">
                <span class="text-gray-500">Founded: </span>
                <span class="ml-2 text-gray-300">{{ $club->founded }}</span>
            </div>
            <div class="flex items-center mb-4">
                <span class="text-gray-500">Location: </span>
                <span class="ml-2 text-gray-300">{{ $club->location }}</span>
            </div>
            <div class="flex items-center mb-4">
                <span class="text-gray-500">Members: </span>
                <span class="ml-2 text-gray-300">{{ $club->members_count }}</span>
            </div>
            <a href="/explore" class="text-blue-500 hover:underline">Back to Clubs</a>
        </div>
    </div>
</x-layout>