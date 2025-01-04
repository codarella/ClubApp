<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Home/Dashboard</title>
</head>
<body class="bg-gray-900 text-gray-100">

  <!-- Header -->
  <header class="bg-gray-800 border-b border-gray-700">
    <div class="container mx-auto px-6 py-6 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-teal-400">{{$heading}}</h1>
      <nav class="flex-1 flex justify-center space-x-4">
        <a href="/" class="text-gray-300 hover:text-teal-400">Home</a>
        <a href="/profile" class="text-gray-300 hover:text-teal-400">Profile</a>
        <a href="/explore" class="text-gray-300 hover:text-teal-400">Explore</a>
      </nav>
      <div class="flex space-x-4">
        <x-button href="/login" class="text-gray-300 hover:text-teal-400 px-4 py-2">Login</x-button>
        <x-button href="/register" class="text-gray-300 hover:text-teal-400 px-4 py-2">Register</x-button>
      </div>
    </div>
  </header>

  {{$slot}}

</body>
</html>