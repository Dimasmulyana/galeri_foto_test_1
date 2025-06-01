<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galeri Foto - Foto Saya</title>
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
  <!-- Konten -->
  <section class="bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Foto Saya</h2>

    @if(session('success'))
      <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    <div class="overflow-x-auto">
      <table class="w-full text-left border border-gray-200 rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-teal-100 text-gray-700">
            <th class="p-3 border border-gray-200">Foto</th>
            <th class="p-3 border border-gray-200">Nama</th>
            <th class="p-3 border border-gray-200">Deskripsi</th>
            <th class="p-3 border border-gray-200">Jumlah Like</th>
            <th class="p-3 border border-gray-200">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($fotos as $foto)
          <tr class="hover:bg-gray-50">
            <td class="p-3 border border-gray-200">
              <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->nama_foto }}" class="w-24 h-16 object-cover rounded-md" />
            </td>
            <td class="p-3 border border-gray-200 text-gray-800 font-medium">{{ $foto->nama_foto }}</td>
            <td class="p-3 border border-gray-200 text-gray-600">{{ $foto->deskripsi }}</td>
            <td class="p-3 border border-gray-200 text-pink-600 font-semibold">
              {{ $foto->jumlah_like }} ❤️
            </td>
            <!-- Tambahkan baris ini untuk menampilkan email user yang upload -->
             <p class="text-sm text-gray-600">Diunggah oleh: {{ $foto->user->email }}</p>
            <td class="p-3 border border-gray-200 space-x-2">
  <button
    onclick="openEditModal({{ $foto->id }}, '{{ $foto->nama_foto }}', '{{ $foto->deskripsi }}')"
    class="text-sm text-blue-600 hover:underline">Edit</button>

  <button
    onclick="openDeleteModal({{ $foto->id }})"
    class="text-sm text-red-500 hover:underline">Hapus</button>
</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>

  <!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 hidden bg-black bg-opacity-50 justify-center items-center z-50">
  <div class="bg-white rounded-lg p-6 w-full max-w-md">
    <h3 class="text-xl font-semibold mb-4">Edit Foto</h3>
    <form id="editForm" method="POST">
      @csrf
      <input type="text" name="nama_foto" id="editNama" class="w-full p-2 border rounded mb-3" placeholder="Nama Foto" required />
      <textarea name="deskripsi" id="editDeskripsi" class="w-full p-2 border rounded mb-3" placeholder="Deskripsi" required></textarea>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Hapus -->
<div id="deleteModal" class="fixed inset-0 hidden bg-black bg-opacity-50 justify-center items-center z-50">
  <div class="bg-white rounded-lg p-6 w-full max-w-sm">
    <h3 class="text-lg font-semibold mb-4 text-center">Yakin ingin menghapus foto ini?</h3>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
      <div class="flex justify-center space-x-3">
        <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
      </div>
    </form>
  </div>
</div>


  <script>
    // Navbar toggle
    document.getElementById('menuToggle').addEventListener('click', () => {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });

    function openEditModal(id, nama, deskripsi) {
    document.getElementById('editForm').action = `/foto/update/${id}`;
    document.getElementById('editNama').value = nama;
    document.getElementById('editDeskripsi').value = deskripsi;
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
  }

  function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
  }

  function openDeleteModal(id) {
    document.getElementById('deleteForm').action = `/foto/delete/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
  }

  function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
  }
  </script>

</body>
</html>
