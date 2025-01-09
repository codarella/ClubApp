<!-- filepath: /c:/Users/OVERLORD/test_app/resources/views/clubs/show.blade.php -->
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

            <!-- Announcements Section -->
            <div class="mt-6">
                <h2 class="text-2xl font-bold text-teal-400 mb-4">Recent Announcements</h2>
                @if($club->announcements->isEmpty())
                    <p class="text-gray-500">No announcements available.</p>
                @else
                    <ul class="list-disc list-inside text-gray-300">
                        @foreach($club->announcements->take(5) as $announcement)
                            <li class="mb-2">
                                <h3 class="text-lg font-bold">{{ $announcement->title }}</h3>
                                <p>{{ $announcement->content }}</p>
                                <span class="text-gray-500 text-sm">{{ $announcement->created_at->format('M d, Y') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @auth
                <div class="mt-6 flex space-x-4">
                    <x-button href="/explore/{{$club->id}}/edit">Edit Club</x-button>
                    <form method="POST" action="{{ route('clubs.destroy', $club) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                            Delete Club
                        </button>
                    </form>
                </div>
            @endauth

            <a href="/explore" class="text-teal-400 hover:underline mt-6 inline-block">Back to Clubs</a>
        </div>
    </div>
</x-layout>