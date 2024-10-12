<?php

// app/Http/Controllers/DokumenController.php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::all();
        return view('dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'url' => 'required|url',
            'kategori_id' => 'required|exists:tbl_kategori_dokumen,id',
            'pengguna_id' => 'required|exists:tbl_users,id',
        ]);

        Dokumen::create($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function show(Dokumen $dokumen)
    {
        return view('dokumen.show', compact('dokumen'));
    }

    public function edit(Dokumen $dokumen)
    {
        return view('dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'url' => 'required|url',
            'kategori_id' => 'required|exists:tbl_kategori_dokumen,id',
            'pengguna_id' => 'required|exists:tbl_users,id',
        ]);

        $dokumen->update($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus');
    }
}