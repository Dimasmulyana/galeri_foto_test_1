<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Controller;

class FotoController extends Controller
{
    // Konstruktor untuk middleware
    public function __construct()
    {
        $this->middleware('auth')->only(['upload', 'store', 'showFotoSaya', 'update', 'destroy']);
    }

    // Tampilkan semua foto di halaman home (bebas tanpa login)
    public function index()
    {
        $fotos = Foto::with('user')->latest()->get();
        return view('home', compact('fotos'));
    }

    // Tampilkan foto milik user yang sedang login
    public function showFotoSaya()
    {
        $fotos = Foto::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('saya', compact('fotos'));
    }

    // Tampilkan halaman upload (kalau kamu bikin method ini)
    public function upload()
    {
        return view('upload');
    }

    // Simpan data foto dari form upload
    public function store(Request $request)
    {
        $request->validate([
            'nama_foto' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'path_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('path_foto')->store('fotos', 'public');

        $foto = new Foto();
        $foto->nama_foto = $request->nama_foto;
        $foto->deskripsi = $request->deskripsi;
        $foto->path_foto = $path;
        $foto->user_id = Auth::id();
        $foto->save();

        return redirect()->route('home')->with('success', 'Foto berhasil diupload.');
    }

    // Tambahkan like pada foto (bebas akses)
    public function like($id)
    {
        $foto = Foto::find($id);
        if ($foto) {
            $foto->jumlah_like += 1;
            $foto->save();
        }

        return redirect()->back();
    }

    // Update data foto milik user yang sedang login
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_foto' => 'required',
            'deskripsi' => 'required',
        ]);

        $foto = Foto::findOrFail($id);
        $foto->nama_foto = $request->nama_foto;
        $foto->deskripsi = $request->deskripsi;
        $foto->save();

        return redirect('/saya')->with('success', 'Foto berhasil diupdate.');
    }

    // Hapus foto dan file dari storage
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);

        if (Storage::exists('public/' . $foto->path_foto)) {
            Storage::delete('public/' . $foto->path_foto);
        }

        $foto->delete();

        return redirect('/saya')->with('success', 'Foto berhasil dihapus.');
    }

    // Pencarian foto berdasarkan nama atau deskripsi (bebas akses)
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $fotos = Foto::where('nama_foto', 'like', "%$keyword%")
            ->orWhere('deskripsi', 'like', "%$keyword%")
            ->get();

        return view('home', compact('fotos', 'keyword'));
    }
}
