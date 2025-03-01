<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Home/Dashboard</title>
</head>
<body class="bg-black text-white">

  <!-- Header -->
  {{-- <header class="bg-gray-800 border-b border-gray-700">
    <div class="container mx-auto px-6 py-6 flex justify-between items-center">
      <nav class="flex-1 flex justify-center space-x-4">
        <a href="/" class="text-gray-300 hover:text-teal-400">Home</a>
        <a href="/profile" class="text-gray-300 hover:text-teal-400">Profile</a>
        <a href="/explore" class="text-gray-300 hover:text-teal-400">Explore</a>
      </nav>
      <div class="flex space-x-4">
        @guest
        <x-button href="/login" class="text-gray-300 hover:text-teal-400 px-4 py-2">Login</x-button>
        <x-button href="/register" class="text-gray-300 hover:text-teal-400 px-4 py-2">Register</x-button>
        
        @endguest

        @auth
          <form method="POST" action='/logout'>
          @csrf
          <button type="submit" class="text-gray-300 hover:text-red-400 px-4 py-2">Logout</button>
          </form>
        @endauth
        
      </div>
    </div>
  </header> --}}

  {{$slot}}

</body>
</html>