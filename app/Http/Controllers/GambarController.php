<?php

// app/Http/Controllers/GambarController.php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function index()
    {
        $gambars = Gambar::all();
        return view('gambar.index', compact('gambars'));
    }

    public function create()
    {
        return view('gambar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url',
            'kategori_id' => 'required|exists:tbl_kategori_gambar,id',
            'pengguna_id' => 'required|exists:tbl_users,id',
        ]);

        Gambar::create($validated);

        return redirect()->route('gambar.index')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function show(Gambar $gambar)
    {
        return view('gambar.show', compact('gambar'));
    }

    public function edit(Gambar $gambar)
    {
        return view('gambar.edit', compact('gambar'));
    }

    public function update(Request $request, Gambar $gambar)
    {
        $validated = $request->validate([
            'url' => 'required|url',
            'kategori_id' => 'required|exists:tbl_kategori_gambar,id',
            'pengguna_id' => 'required|exists:tbl_users,id',
        ]);

        $gambar->update($validated);

        return redirect()->route('gambar.index')->with('success', 'Gambar berhasil diperbarui');
    }

    public function destroy(Gambar $gambar)
    {
        $gambar->delete();

        return redirect()->route('gambar.index')->with('success', 'Gambar berhasil dihapus');
    }
}