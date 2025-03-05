<x-layout>
    <div class="container mx-auto mt-8 px-6 md:pl-[280px]">
        
        <!-- Club Cover Banner -->
        <div class="relative h-48 bg-gray-800 rounded-lg shadow-md overflow-hidden">
            @if($club->banner)
                <img src="{{ $club->banner }}" alt="Club Banner" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-300">No Cover Banner</span>
                </div>
            @endif
        </div>

        <!-- Club Header -->
        <div class="bg-gray-900 text-gray-100 shadow-lg rounded-lg p-6 mt-4 flex items-center">
            <img src="{{ $club->logo }}" alt="Club Logo" class="w-16 h-16 rounded-full border-4 border-gray-900">
            <div class="ml-4">
                <h1 class="text-3xl font-bold text-teal-400">{{ $club->name }}</h1>
                <p class="text-gray-300">{{ $club->description }}</p>
            </div>

            <!-- Membership Button -->
            <div class="ml-auto">
                @auth
                    <form action="/explore/{{ $club->id }}/toggle-membership" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            class="px-4 py-2 rounded-lg font-semibold text-white transition-all
                                {{ Auth::user()->clubs->contains($club->id) ? 'bg-red-500 hover:bg-red-600' : 'bg-teal-500 hover:bg-teal-600' }}">
                            {{ Auth::user()->clubs->contains($club->id) ? 'Joined' : 'Join' }}
                        </button>
                    </form>
                @endauth
            </div>
        </div>

        <div class="flex mt-8">
            <!-- Left Sidebar (optional if needed) -->
            @include('components.left-sidebar', ['clubs' => $clubs])

            <!-- Club Main Content -->
            <section class="w-3/5 mx-4">
                <!-- Create Post Button -->
                @auth
                    <div class="flex justify-end">
                        <button class="flex items-center bg-blue-600 px-5 py-3 rounded-lg text-white font-semibold hover:bg-blue-500 transition-all">
                            <i class="fas fa-plus mr-2"></i> Create Post
                        </button>
                    </div>
                @endauth

                <!-- Club Posts -->
                <h2 class="text-2xl font-semibold mt-6 text-white">Recent Posts</h2>
                <div class="mt-4 space-y-6">
                    {{-- Display posts here --}}
                </div>
            </section>

            <!-- Right Sidebar -->
            <aside class="w-1/4 bg-gray-900 p-6 rounded-xl shadow-md border border-gray-700">
                <h2 class="text-xl font-semibold text-white">About Community</h2>
                <p class="text-gray-400 mt-2">{{ $club->description }}</p>
                <div class="mt-4 text-gray-400">
                    <p><strong class="text-white">{{ $club->members_count }}</strong> Members</p>
                    <p><strong class="text-white">{{ $club->active_users }}</strong> Online</p>
                </div>
                <hr class="border-gray-700 my-4">
                <h3 class="text-lg font-semibold text-white">Rules</h3>
                <ul class="mt-2 space-y-2 text-gray-400">
                    {{-- Display club rules here --}}
                </ul>
            </aside>
        </div>

        <a href="/explore" class="text-teal-400 hover:underline mt-6 inline-block">Back to Clubs</a>
    </div>
</x-layout>
