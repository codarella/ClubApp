<x-layout>
    <x-slot:heading>Explore</x-slot:heading>
    <body class="bg-black text-white">
        <!-- Full-Width Main Content -->
        <main class="w-full py-6">
            <!-- Page Heading -->
            <h2 class="text-3xl font-bold text-gray-300 mb-6 px-8">
                Looking for something new?
            </h2>

            <!-- Search Form at the Top -->
            <div class="px-6 mb-6 flex justify-center">
                <form method="GET" action="/explore" class="flex items-center space-x-3 w-full max-w-2xl">
                    <i class="fas fa-search text-gray-400"></i>
                    <input type="text" name="search" placeholder="Search for a club" 
                        class="bg-gray-900 text-white p-3 rounded-lg w-full border border-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" 
                        value="{{ request('search') }}">
                    <button type="submit" class="bg-teal-500 text-white px-6 py-3 rounded-lg hover:bg-teal-600">
                        Search
                    </button>
                </form>
            </div>
            
            <div class="flex gap-6 px-6">
                <!-- Sidebar -->
                <aside class="w-1/5 bg-gray-900 p-6 rounded-2xl shadow-lg overflow-y-auto max-h-screen">
                    <ul class="space-y-4">
                        <li>
                            <a href="/" class="flex items-center text-gray-400 hover:text-white space-x-2">
                                <i class="fas fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-400 hover:text-white space-x-2">
                                <i class="fas fa-fire"></i>
                                <span>Popular</span>
                            </a>
                        </li>
                        <li>
                            <a href="/explore" class="flex items-center text-gray-400 hover:text-white space-x-2">
                                <i class="fas fa-compass"></i>
                                <span>Explore</span>
                            </a>
                        </li>
                    </ul>
                    
                    <h2 class="text-xl font-semibold mt-8 text-gray-200">Your Communities</h2>
                    <div class="relative mt-4">
                        <button class="w-full text-left text-gray-400 hover:text-white flex items-center justify-between">
                            <span>▼ Communities</span>
                        </button>
                        <ul class="hidden mt-2 space-y-3 bg-gray-800 p-3 rounded-lg shadow-lg">
                            @foreach($clubs as $club)
                                <li>
                                    <a href="/explore/{{ $club->club_id }}" class="block text-gray-400 hover:text-white">
                                        {{ $club->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <h2 class="text-xl font-semibold mt-8 text-gray-200">Resources</h2>
                    <ul class="mt-4 space-y-3">
                        <li>
                            <a href="#" class="block text-gray-400 hover:text-white">About ClubApp</a>
                        </li>
                        <li>
                            <a href="#" class="block text-gray-400 hover:text-white">Help</a>
                        </li>
                        <li>
                            <a href="#" class="block text-gray-400 hover:text-white">Advertise</a>
                        </li>
                    </ul>
                </aside>

                <!-- Main Content -->
                <div class="flex-1">
                    @auth
                        <div class="mb-6 flex justify-end">
                            <x-button href="/explore/create" class="bg-teal-500 text-white rounded-full hover:bg-teal-600 px-5 py-2">
                                + Create Club
                            </x-button>
                        </div>
                    @endauth
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($clubs as $club)
                            <x-club-card :club="$club" />
                        @endforeach
                    </div>
                    
                    <!-- Pagination Links -->
                    <div class="mt-6 flex justify-center">
                        {{ $clubs->links() }}
                    </div>
                </div>
            </div>
        </main>
    </body>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dropdownButton = document.querySelector(".relative button");
            const dropdownMenu = dropdownButton.nextElementSibling;

            dropdownButton.addEventListener("click", function () {
                dropdownMenu.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        });
    </script>
</x-layout>
