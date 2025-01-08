<!-- filepath: /resources/views/auth/register.blade.php -->
<x-layout>
    <div class="container mx-auto px-6 py-6">
        <div class="bg-gray-800 p-6 rounded-lg max-w-md mx-auto">
            <h2 class="text-xl font-bold text-teal-400 mb-4">Register</h2>
            <form method="POST" action="/register">
                @csrf
                <div class="mb-4">
                    <label class="text-gray-300">Name</label>
                    <input type="text" name="name" class="bg-gray-700 w-full p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="text-gray-300">Email</label>
                    <input type="email" name="email" class="bg-gray-700 w-full p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="text-gray-300">Password</label>
                    <input type="password" name="password" class="bg-gray-700 w-full p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="text-gray-300">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="bg-gray-700 w-full p-2 rounded" required>
                </div>
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600">
                    Register
                </button>
            </form>
        </div>
    </div>
</x-layout>