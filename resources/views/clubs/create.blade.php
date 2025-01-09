<x-layout>
    <x-slot:heading>Create Club</x-slot:heading>

    <div class="container mx-auto px-6 py-6">
        <div class="bg-gray-800 p-6 rounded-lg max-w-md mx-auto">
            <h2 class="text-xl font-bold text-teal-400 mb-4">Create Club</h2>
            <form method="POST" action="/explore">
                @csrf
                <div class="mb-4">
                    <label class="text-gray-300">Name</label>
                    <input type="text" name="name" class="bg-gray-700 w-full p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="text-gray-300">Description</label>
                    <textarea name="description" class="bg-gray-700 w-full p-2 rounded" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="text-gray-300">Contact Email</label>
                    <input type="email" name="contact_email" class="bg-gray-700 w-full p-2 rounded" required>
                </div>
                
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600">
                    Create Club
                </button>
            </form>
        </div>
    </div>
</x-layout>