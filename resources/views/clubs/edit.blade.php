<x-layout>
    <x-slot:heading>Edit Club</x-slot:heading>

    <div class="container mx-auto px-6 py-6">
        <div class="bg-gray-800 p-6 rounded-lg max-w-md mx-auto">
            <h2 class="text-xl font-bold text-teal-400 mb-4">Edit Club</h2>
            <form method="POST" action="/explore/{{ $club->id }}">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="stext-gray-300">Name</label>
                    <input type="text" name="name" class="bg-gray-700 w-full p-2 rounded" value="{{ $club->name }}" required>
                </div>
                <div class="mb-4">
                    <label class="text-gray-300">Descriptieon</label>
                    <textarea name="description" class="bg-gray-700 w-full p-2 rounded" required>{{ $club->description }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label class="text-gray-300">Contact Email</label>
                    <input type="email" name="contact_email" class="bg-gray-700 w-full p-2 rounded" value="{{ $club->contact_email }}" required>
                </div>
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600">
                    Update Club
                </button>
            </form>
        </div>
    </div>
</x-layout>