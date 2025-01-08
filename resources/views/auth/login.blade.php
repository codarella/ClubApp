<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login</title>
</head>
<body class="bg-gray-900 text-gray-100 flex items-center justify-center min-h-screen">

  <!-- Login Form -->
  <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-teal-400 text-center mb-6">Welcome Back</h2>
    <form action="/login" method="POST" class="space-y-6">
        @csrf
      <!-- Email Input -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          required 
          class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md focus:ring-2 focus:ring-teal-400 focus:outline-none"
          placeholder="Enter your email">
          @error('email')
          <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password Input -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          required 
          class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md focus:ring-2 focus:ring-teal-400 focus:outline-none"
          placeholder="Enter your password">
      </div>

      <!-- Remember Me -->
      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm text-gray-300">
          <input 
            type="checkbox" 
            name="remember" 
            class="h-4 w-4 text-teal-400 bg-gray-700 border-gray-600 focus:ring-teal-400 focus:ring-2 rounded">
          <span class="ml-2">Remember Me</span>
        </label>
        <a href="#" class="text-sm text-teal-400 hover:underline">Forgot Password?</a>
      </div>

      <!-- Submit Button -->
      <button 
        type="submit" 
        class="w-full bg-teal-500 hover:bg-teal-400 text-gray-900 font-semibold py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-offset-2">
        Login
      </button>
    </form>

    <!-- Sign-Up Link -->
    <p class="mt-6 text-center text-sm text-gray-300">
      Don’t have an account? 
      <a href="/register" class="text-teal-400 hover:underline">Sign Up</a>
    </p>
  </div>

</body>
</html>
