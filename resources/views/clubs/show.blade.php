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

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
             @endif

            @if(session('info'))
                <div class="bg-blue-500 text-white p-4 rounded-lg mb-4">
                    {{ session('info') }}
                </div>
            @endif
            @if(session('error'))
            <div class="bg-red-500  text-white p-4 rounded-lg mb-4">
                {{session('error')}}
            </div>
            @endif
            

            

            

           
            @auth
                <div class="mt-6 flex space-x-4">
                    @can('edit-club' , $club)

                    <x-button href="/explore/{{$club->id}}/edit">Edit Club</x-button>
                    @endcan
                    @can ('edit-club', $club)
                    <form method="POST" action="{{ route('clubs.destroy', $club) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                            Delete Club
                        </button>
                    </form>
                    @endcan
                </div>
            @endauth
            @auth
            
            @cannot('is-Member', $club)
            <form action="/explore/{{ $club->id }}/join" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600">
                    Join {{ $club->name }}
                </button>
            </form>
            @endcannot
            
            @can('is-Member', $club)
            <form action="/explore/{{ $club->id }}/leave" method="POST" class="mt-6">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600">
                    Leave club {{ $club->name }}
                </button>
            </form>
            @endcan
            @endauth


            


            <a href="/explore" class="text-teal-400 hover:underline mt-6 inline-block">Back to Clubs</a>
        </div>
    </div>
</x-layout>