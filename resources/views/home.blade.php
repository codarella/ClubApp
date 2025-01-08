<x-layout>
<x-slot:heading> Home Page</x-slot:heading>
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
  {{-- <header class="bg-gray-800 border-b border-gray-700">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-teal-400">Student Club Management</h1>
      <nav>
        <a href="#" class="text-gray-300 hover:text-teal-400 mx-2">Home</a>
        <a href="#" class="text-gray-300 hover:text-teal-400 mx-2">Profile</a>
        <a href="#" class="text-gray-300 hover:text-teal-400 mx-2">Logout</a>
      </nav>
    </div>
  </header> --}}

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-16">
    <!-- Welcome Message -->
    <section class="bg-gray-800 p-6 rounded-lg shadow-md mb-12">
      @auth
      <h2 class="text-3xl font-semibold text-teal-400">Welcome, {{auth()->user()->name}}!</h2>
      <p class="text-gray-300 mt-2">Here’s what’s happening in your clubs:</p>
      @endauth
      @guest
      <h2 class="text-3xl font-semibold text-teal-400">Welcome, Guest!</h2>
      <p class="text-gray-300 mt-2">Please login to view your clubs.</p>
      @endguest

       
    </section>

    <!-- Announcements Section -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-teal-400 mb-4">Recent Announcements</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gray-800 p-4 rounded-md shadow">
          <h3 class="text-lg font-semibold text-teal-400">Meeting Tomorrow</h3>
          <p class="text-gray-300 mt-2">Don't forget about the meeting tomorrow at 10 AM in the main hall.</p>
        </div>
      </div>
    </section>

    <!-- Event Calendar -->
    <section>
      <h2 class="text-2xl font-semibold text-teal-400 mb-4">Upcoming Events</h2>
      <p class="text-gray-300">View your events in the calendar section.</p>
    </section>
  </main>

</body>
</html>
</x-layout>