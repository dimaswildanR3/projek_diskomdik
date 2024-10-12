<?php

// app/Http/Controllers/KategoriDokumenController.php

namespace App\Http\Controllers;

use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class KategoriDokumenController extends Controller
{
    public function index()
    {
        $kategoriDokumens = KategoriDokumen::all();
        return view('kategori_dokumen.index', compact('kategoriDokumens'));
    }

    public function create()
    {
        return view('kategori_dokumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        KategoriDokumen::create($validated);

        return redirect()->route('kategori-dokumen.index')->with('success', 'Kategori dokumen berhasil ditambahkan');
    }

    public function show(KategoriDokumen $kategoriDokumen)
    {
        return view('kategori_dokumen.show', compact('kategoriDokumen'));
    }

    public function edit(KategoriDokumen $kategoriDokumen)
    {
        return view('kategori_dokumen.edit', compact('kategoriDokumen'));
    }

    public function update(Request $request, KategoriDokumen $kategoriDokumen)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $kategoriDokumen->update($validated);

        return redirect()->route('kategori-dokumen.index')->with('success', 'Kategori dokumen berhasil diperbarui');
    }

    public function destroy(KategoriDokumen $kategoriDokumen)
    {
        $kategoriDokumen->delete();

        return redirect()->route('kategori-dokumen.index')->with('success', 'Kategori dokumen berhasil dihapus');
    }
}