<x-layout>
    <x-slot:heading>Profile</x-slot:heading>
 
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>
      <title>Profile</title>
    </head>
    <body class="bg-gray-900 text-gray-100">
    
      <!-- Header -->

    
      <!-- Main Content -->
      <main class="container mx-auto px-6 py-16">
        <!-- Profile Overview Section -->
        <section class="bg-gray-800 p-6 rounded-lg shadow-md mb-12 flex items-center space-x-6">
          <div class="w-20 h-20 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden">
            <!-- Profile Picture -->
            <img src="https://via.placeholder.com/80" alt="User Profile Picture" class="w-full h-full object-cover">
          </div>
          <div>
            {{-- <div class="text-gray-300">
              @auth
                Welcome, {{ auth()->user()->name }}!
              @else
                Welcome, Guest!
              @endauth
            </div> --}}
            @guest
            <h2 class="text-3xl font-semibold text-teal-400">Guest</h2>
            {{-- <p class="text-gray-300 mt-2">Email: john@example.com</p> --}}
            <p class="text-gray-300 mt-2">Please login to view your clubs.</p>
            @endguest

            @auth
                        {{-- <p class="text-gray-500">Here’s what’s happening in your clubs:</p>             --}}

            <h2 class="text-3xl font-semibold text-teal-400">{{auth()->user()->name}}</h2>
            <p class="text-gray-300 mt-2">Email: {{auth()->user()->email}}</p>
            <p class="text-gray-500">Here’s what’s happening in your clubs:</p>            

            @endauth
          </div>
        </section>
    
        <!-- Clubs Section -->
        <section class="mb-12">
          <h2 class="text-2xl font-semibold text-teal-400 mb-4">My Clubs</h2>
          <div class="space-y-4">
            <!-- Club Item Example -->
            <div class="bg-gray-800 p-4 rounded-md shadow flex justify-between items-center">
              <div>
                <h3 class="text-lg font-semibold text-teal-400">Programming Club</h3>
                <p class="text-gray-300">Member</p>
              </div>
              <a href="#" class="bg-teal-500 text-gray-900 px-4 py-2 rounded-md hover:bg-teal-400">Enter Forum</a>
            </div>
            <div class="bg-gray-800 p-4 rounded-md shadow flex justify-between items-center">
              <div>
                <h3 class="text-lg font-semibold text-teal-400">Art Club</h3>
                <p class="text-gray-300">Admin</p>
              </div>
              <a href="#" class="bg-teal-500 text-gray-900 px-4 py-2 rounded-md hover:bg-teal-400">Enter Forum</a>
            </div>
            <!-- Add more clubs as needed -->
          </div>
        </section>
    
        <!-- Admin Club Section -->
        <section class="mb-12">
          <h2 class="text-2xl font-semibold text-teal-400 mb-4">Admin Roles</h2>
          <div class="space-y-4">
            <!-- Admin Club Item -->
            <div class="bg-gray-800 p-4 rounded-md shadow">
              <h3 class="text-lg font-semibold text-teal-400">Art Club</h3>
              <p class="text-gray-300">You are the admin of this club.</p>
            </div>
            <!-- More Admin Clubs can be listed -->
          </div>
        </section>
      </main>
    
    </body>
    </html>
    
</x-layout>