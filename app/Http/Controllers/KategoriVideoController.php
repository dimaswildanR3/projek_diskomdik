<?php

// app/Http/Controllers/KategoriVideoController.php

namespace App\Http\Controllers;

use App\Models\KategoriVideo;
use Illuminate\Http\Request;

class KategoriVideoController extends Controller
{
    public function index()
    {
        $kategoriVideos = KategoriVideo::all();
        return view('kategori_video.index', compact('kategoriVideos'));
    }

    public function create()
    {
        return view('kategori_video.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        KategoriVideo::create($validated);

        return redirect()->route('kategori-video.index')->with('success', 'Kategori video berhasil ditambahkan');
    }

    public function show(KategoriVideo $kategoriVideo)
    {
        return view('kategori_video.show', compact('kategoriVideo'));
    }

    public function edit(KategoriVideo $kategoriVideo)
    {
        return view('kategori_video.edit', compact('kategoriVideo'));
    }

    public function update(Request $request, KategoriVideo $kategoriVideo)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $kategoriVideo->update($validated);

        return redirect()->route('kategori-video.index')->with('success', 'Kategori video berhasil diperbarui');
    }

    public function destroy(KategoriVideo $kategoriVideo)
    {
        $kategoriVideo->delete();

        return redirect()->route('kategori-video.index')->with('success', 'Kategori video berhasil dihapus');
    }
}