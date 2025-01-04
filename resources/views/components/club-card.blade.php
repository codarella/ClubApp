<div class="bg-gray-800 p-6 rounded-lg shadow-lg">
    <h3 class="text-lg font-bold text-teal-400">{{ $club->name }}</h3>
    <p class="text-gray-300">{{ $club->description }}</p>
    <p class="text-gray-500 mt-2">Founded: {{ $club->founded }}</p>
    <p class="text-gray-500">President: {{ $club->president }}</p>
    <p class="text-gray-500">Contact: {{ $club->contact_email }}</p>
</div>