<div class="bg-gray-900 p-6 rounded-xl border border-gray-700 shadow-md">
    <x-link href="/explore/{{$club->id}}" class="text-lg font-bold text-white hover:text-red-500">
        {{$club->name}}
    </x-link>
    <p class="text-gray-400 mt-2">{{ $club->description }}</p>
    <div class="mt-4 text-gray-500 space-y-1">
        <p>📅 Founded: {{ $club->founded }}</p>
        <p>👤 President: {{ $club->president }}</p>
        <p>📧 Contact: {{ $club->contact_email }}</p>
    </div>
</div>
