<aside class="w-1/5 bg-gray-900 p-6 rounded-xl shadow-md border border-gray-700">
    <ul class="space-y-3">
        <li>
            <a href="#" class="block text-gray-400 hover:text-white">
                <i class="fas fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="#" class="block text-gray-400 hover:text-white">
                <i class="fas fa-fire"></i> Popular
            </a>
        </li>
        <li>
            <a href="/explore" class="block text-gray-400 hover:text-white">
                <i class="fas fa-compass"></i> Explore
            </a>
        </li>
    </ul>
    <h2 class="text-xl font-semibold mt-6">Your Communities</h2>
    <div class="relative mt-4">
        <button class="w-full text-left text-gray-400 hover:text-white">
            ▼ Communities
        </button>
        <ul class="hidden mt-2 space-y-3 bg-gray-800 p-3 rounded-lg">
            @foreach($clubs as $club)
                <li>
                    <a href="/explore/{{ $club->club_id }}" class="block text-gray-400 hover:text-white">
                        {{ $club->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <h2 class="text-xl font-semibold mt-6">Resources</h2>
    <ul class="mt-4 space-y-3">
        <li>
            <a href="#" class="block text-gray-400 hover:text-white">
                About ClubApp
            </a>
        </li>
        <li>
            <a href="#" class="block text-gray-400 hover:text-white">
                Help
            </a>
        </li>
        <li>
            <a href="#" class="block text-gray-400 hover:text-white">
                Advertise
            </a>
        </li>
    </ul>
</aside>