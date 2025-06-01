<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Upload Foto</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7fafc] min-h-screen p-4 font-sans">
 <!-- Navbar -->
  <header class="bg-white shadow-md p-4 flex justify-between items-center mb-6 rounded-lg max-w-7xl mx-auto">
    <h1 class="text-2xl font-bold text-teal-600">Galeri Foto</h1>

    <!-- Hamburger Button -->
    <button id="menuToggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Menu Desktop -->
<nav id="navMenu" class="hidden md:flex space-x-4 text-sm font-medium items-center">
  <a href="/home" class="text-gray-700 hover:text-teal-600">Beranda</a>

  @auth
    <a href="/upload" class="text-gray-700 hover:text-teal-600">Upload Foto</a>
    <a href="/saya" class="text-gray-700 hover:text-teal-600">Foto Saya</a>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-700 hover:text-red-600">Logout</a>
  @else
    <a href="/login" class="text-gray-700 hover:text-teal-600">Login</a>
  @endauth
</nav>
</header>

<!-- Menu Mobile -->
<div id="mobileMenu" class="hidden md:hidden flex flex-col space-y-2 px-4 mb-4 max-w-7xl mx-auto">
  <a href="/home" class="text-gray-700 hover:text-teal-600">Beranda</a>

  @auth
    <a href="/upload" class="text-gray-700 hover:text-teal-600">Upload Foto</a>
    <a href="/saya" class="text-gray-700 hover:text-teal-600">Foto Saya</a>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-700 hover:text-red-600">Logout</a>
  @else
    <a href="/login" class="text-gray-700 hover:text-teal-600">Login</a>
  @endauth
</div>

<!-- Form Logout Tersembunyi -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
  @csrf
</form>
  <main class="bg-white p-6 rounded-xl shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Upload Foto</h2>

    <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-5">
        <label for="namaFoto" class="block text-gray-700 font-semibold mb-2">Nama Foto</label>
        <input
          id="namaFoto"
          name="nama_foto"
          type="text"
          placeholder="Masukkan nama foto"
          class="w-full px-4 py-3 border border-teal-200 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 transition"
          required
        />
      </div>

      <div class="mb-5">
        <label for="deskripsiFoto" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
        <textarea
          id="deskripsiFoto"
          name="deskripsi"
          placeholder="Deskripsi foto..."
          rows="4"
          class="w-full px-4 py-3 border border-teal-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 transition resize-none"
        ></textarea>
      </div>

      <div class="mb-6">
        <label for="fileFoto" class="block text-gray-700 font-semibold mb-2">Pilih Foto</label>
        <input
          id="fileFoto"
          name="path_foto"
          type="file"
          accept="image/*"
          class="w-full text-gray-600"
          required
        />
      </div>

      <button
        type="submit"
        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 rounded-full transition"
      >
        Upload
      </button>
    </form>
  </main>

   <script>
    // Navbar toggle
    document.getElementById('menuToggle').addEventListener('click', () => {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
