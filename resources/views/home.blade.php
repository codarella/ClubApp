<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClubApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-black text-white">

<header class="flex justify-between items-center p-4 border-b border-gray-800 bg-gray-900 shadow-lg">
    <div class="flex items-center space-x-4">
        <h1 class="text-2xl font-bold text-red-500">ClubApp</h1>
        <input type="text" placeholder="Search ClubApp" class="bg-gray-800 text-white px-4 py-2 rounded-lg w-96">
    </div>
    <div class="flex items-center space-x-4">
        @auth
            <span class="text-gray-400">Welcome, {{ Auth::user()->name }}</span>
            <button class="px-4 py-2 bg-gray-700 text-white rounded-full hover:bg-gray-600">+ Create</button>
        @endauth
        <div class="flex space-x-4">
            @guest
                <x-button href="/login" class="text-gray-300 hover:text-teal-400 px-4 py-2">Login</x-button>
                <x-button href="/register" class="text-gray-300 hover:text-teal-400 px-4 py-2">Register</x-button>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-red-400 px-4 py-2">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>

<div class="flex mt-8 px-4">
    <!-- Sidebar: Left -->
    @include ('components.left-sidebar',['clubs'=>$clubs])

    <!-- Posts Section -->
    <section class="w-3/5 mx-4">
        <h2 class="text-3xl font-bold">Your Feed</h2>
        <div class="mt-6 space-y-6">
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-700 shadow-md">
                <h3 class="text-xl font-semibold">[40/M] How can I ask my wife [35/F] of 10 years to stop making jokes about oral sex?</h3>
                <p class="text-gray-400">We have an awesome relationship. Never fight, no yelling or name calling...</p>
                <div class="flex justify-between text-gray-500 mt-2">
                    <span>Posted by u/user1 | r/relationship_advice</span>
                    <span>80 comments | 8 upvotes</span>
                </div>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-700 shadow-md">
                <h3 class="text-xl font-semibold">AITA for refusing to sign a prenup after marriage?</h3>
                <p class="text-gray-400">I am NOT OOP. OOP is u/Boymom1505...</p>
                <div class="flex justify-between text-gray-500 mt-2">
                    <span>Posted by u/user2 | r/BestofRedditorUpdates</span>
                    <span>130 comments | 2K upvotes</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Sidebar: Right -->
    {{-- <aside class="w-1/5 bg-gray-900 p-6 rounded-xl shadow-md border border-gray-700">
        <h2 class="text-xl font-semibold">Recent Posts</h2>
        <ul class="mt-4 space-y-3">
            <li><a href="#" class="block text-gray-400 hover:text-white">33F 37M My boyfriend is pressuring me</a></li>
            <li><a href="#" class="block text-gray-400 hover:text-white">30M - My girlfriend 30F, because I didn’t talk enough.</a></li>
            <li><a href="#" class="block text-gray-400 hover:text-white">My uncle is strangely with my sister</a></li>
            <li><a href="#" class="block text-gray-400 hover:text-white">My [21F] roommate and best friend [20F] threw out my abortion pill</a></li>
        </ul>
    </aside> --}}
    <x-right-sidebar/>
</div>

<footer class="text-center p-6 border-t border-gray-800 text-gray-500 mt-8">
    &copy; 2025 ClubApp. All rights reserved.
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownButton = document.querySelector(".relative button");
        const dropdownMenu = dropdownButton.nextElementSibling;

        dropdownButton.addEventListener("click", function () {
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>

</body>
</html>
