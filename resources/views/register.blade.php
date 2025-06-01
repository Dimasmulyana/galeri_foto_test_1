<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body
  class="flex items-center justify-center min-h-screen bg-cover bg-center"
  style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1470&q=80');"
>
  <div class="bg-white bg-opacity-80 p-8 rounded-2xl shadow-lg w-full max-w-sm backdrop-blur-sm">
    <div class="flex justify-center mb-6">
      <div class="text-teal-500 text-6xl"></div>
    </div>

    <form action="/register" method="POST">
      @csrf
      <div class="mb-4">
        <input
          type="text"
          name="name"
          placeholder="Username"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-400"
        />
      </div>
      <div class="mb-4">
        <input
          type="email"
          name="email"
          placeholder="Email"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-400"
        />
      </div>
      <div class="mb-4">
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-400"
        />
      </div>

      <div class="mb-4">
        <input
         type="password"
         name="password_confirmation"
         placeholder="Konfirmasi Password"
         required
         class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-400"
        />
      </div>


      <button
        type="submit"
        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 rounded-full"
      >
        REGISTER
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
      Already have an account?
      <a href="{{ url('/login') }}" class="text-teal-500 hover:underline">Login here</a>
    </p>
  </div>
</body>
</html>
