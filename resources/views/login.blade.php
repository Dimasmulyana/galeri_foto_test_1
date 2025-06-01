<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body
  class="flex items-center justify-center min-h-screen bg-cover bg-center"
  style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1470&q=80');"
>
  <div class="bg-white bg-opacity-80 p-8 rounded-2xl shadow-lg w-full max-w-sm backdrop-blur-sm">
    <div class="flex justify-center mb-6">
      <div class="text-teal-500 text-6xl"></div>
    </div>

    {{-- ✅ Pesan sukses setelah register --}}
    @if (session('success'))
      <div class="mb-4 text-green-600 text-sm text-center bg-green-100 border border-green-300 rounded p-2">
        {{ session('success') }}
      </div>
    @endif

    {{-- ✅ Pesan error jika login gagal --}}
    @if (session('error'))
      <div class="mb-4 text-red-600 text-sm text-center bg-red-100 border border-red-300 rounded p-2">
        {{ session('error') }}
      </div>
    @endif

    <form action="/login" method="POST">
      @csrf
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

      <div class="flex justify-between items-center text-sm text-gray-600 mb-6">
        <label class="flex items-center">
          <input type="checkbox" name="remember" class="mr-2 accent-teal-500" />
          Remember me
        </label>
        <a href="#" class="text-teal-500 hover:underline">Forgot password?</a>
      </div>

      <button
        type="submit"
        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 rounded-full"
      >
        LOGIN
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
      Don't have an account?
      <a href="{{ url('/register') }}" class="text-teal-500 hover:underline">Register here</a>
    </p>
  </div>
</body>
</html>
