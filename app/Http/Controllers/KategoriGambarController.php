<?php

// app/Http/Controllers/KategoriGambarController.php

namespace App\Http\Controllers;

use App\Models\KategoriGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriGambarController extends Controller
{
    public function index()
    {
        $kategoriGambar = KategoriGambar::all();
        return view('kategori_gambar.index', compact('kategoriGambar'));
    }

    public function create()
    {
        return view('kategori_gambar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Simpan gambar yang diupload
        $path = $request->file('url')->store('images/kategori_gambar', 'public');
        $validated['url'] = $path;
    
        KategoriGambar::create($validated);
    
        return redirect()->route('kategori-gambar.index')->with('success', 'Kategori gambar berhasil ditambahkan');
    }

    public function show(KategoriGambar $kategoriGambar)
    {
        return view('kategori_gambar.show', compact('kategoriGambar'));
    }

    public function edit(KategoriGambar $kategoriGambar)
    {
        return view('kategori_gambar.edit', compact('kategoriGambar'));
    }

    public function update(Request $request, KategoriGambar $kategoriGambar)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('url')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete($kategoriGambar->url);

            // Simpan gambar baru dan ambil path-nya
            $validated['url'] = $request->file('url')->store('images/kategori_gambar', 'public');
        }

        // Update model
        $kategoriGambar->update($validated);

        return redirect()->route('kategori-gambar.index')->with('success', 'Kategori gambar berhasil diperbarui');
    }

    public function destroy(KategoriGambar $kategoriGambar)
    {
        // Hapus gambar jika ada
        Storage::disk('public')->delete($kategoriGambar->url);
        $kategoriGambar->delete();

        return redirect()->route('kategori-gambar.index')->with('success', 'Kategori gambar berhasil dihapus');
    }
}
