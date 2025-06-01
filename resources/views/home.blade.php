<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galeri Foto - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7fafc] min-h-screen font-sans">
<br>
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

  <!-- Konten Utama -->
  <div class="max-w-7xl mx-auto px-4">

    <!-- Form Pencarian -->
    <form action="{{ route('foto.search') }}" method="GET" class="w-full sm:w-2/3 md:w-1/2 mb-6 mx-auto">
      <input
        type="text"
        name="keyword"
        placeholder="Cari foto..."
        class="w-full px-5 py-3 border border-teal-200 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-teal-400 transition"
        required
      />
    </form>

    @if(isset($keyword))
      <p class="text-center text-gray-600 mb-4">
        Hasil pencarian untuk: <strong>{{ $keyword }}</strong>
      </p>
    @endif

    <!-- Galeri Foto -->
    <main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @if($fotos->isEmpty())
        <p class="text-center text-red-500 col-span-full">Tidak ada foto ditemukan.</p>
      @endif

      @foreach($fotos as $foto)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <img 
            src="{{ asset('storage/' . $foto->path_foto) }}" 
            alt="{{ $foto->nama_foto }}" 
            class="w-full h-52 object-cover cursor-pointer"
            onclick="openModal(
              '{{ $foto->nama_foto }}',
              '{{ $foto->deskripsi ?? 'Tidak ada deskripsi.' }}',
              '{{ $foto->user->email }}',
              '{{ $foto->jumlah_like ?? 0 }}',
              '{{ asset('storage/' . $foto->path_foto) }}'
            )"
          />
          <div class="p-4 flex justify-between items-center">
            <p class="font-semibold text-gray-700">{{ $foto->nama_foto }}</p>
            <a href="{{ route('foto.like', $foto->id) }}" class="text-red-500 hover:text-red-700">
              ❤️ Like ({{ $foto->jumlah_like ?? 0 }})
            </a>
          </div>
        </div>
      @endforeach
    </main>
  </div>

  <!-- Modal Foto -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full overflow-hidden">
      <img id="modalImg" src="" alt="Foto Detail" class="w-full object-contain" />
      <div class="p-4">
        <h2 id="modalTitle" class="font-bold text-xl mb-2"></h2>
        <p id="modalDesc" class="mb-1"></p>
        <p id="modalUser" class="text-gray-500 text-sm mb-1"></p>
        <p id="modalLikes" class="text-pink-600 font-semibold mb-1"></p>
        <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
          Tutup
        </button>
      </div>
    </div>
  </div>

  <script>
    // Toggle Mobile Menu
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    @auth
      const loggedInEmail = "{{ Auth::user()->email }}";
    @else
      const loggedInEmail = undefined;
    @endauth

    function openModal(title, desc, email, likes, imgSrc) {
      document.getElementById('modalTitle').textContent = title;
      document.getElementById('modalDesc').textContent = desc;
      document.getElementById('modalUser').textContent = 'Di-upload oleh: ' + email;
      document.getElementById('modalLikes').textContent = 'Likes: ' + likes;
      document.getElementById('modalImg').src = imgSrc;

      document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('modal').classList.add('hidden');
    }
  </script>

</body>
</html>
