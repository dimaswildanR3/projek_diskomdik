<?php

// app/Http/Controllers/AgendaController.php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();
        return view('agenda/index', compact('agendas'));
    }

    public function create()
    {
        return view('agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'kategori_id' => 'required|exists:tbl_kategori_agenda,id',
            'pengguna_id' => 'required|exists:users,id',
        ]);

        Agenda::create($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'kategori_id' => 'required|exists:tbl_kategori_agenda,id',
            'pengguna_id' => 'required|exists:users,id',
        ]);

        $agenda->update($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}