<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    // Menampilkan semua rute
    public function index()
    {
        $rutes = Rute::all();
        return view('rute.index', compact('rutes'));
    }

    // Menampilkan form untuk membuat rute baru
    public function create()
    {
        return view('rute.create');
    }

    // Menyimpan rute baru
    public function store(Request $request)
    {
        $request->validate([
            'rute_awal' => 'required|string|max:255',
            'rute_tujuan' => 'required|string|max:255',
        ]);

        // Dapatkan ID maksimum dan tambah 1 untuk Oracle
        $maxId = Rute::max('id_rute') ?? 0;
        $newId = $maxId + 1;
        
        Rute::create([
            'id_rute' => $newId,
            'rute_awal' => $request->rute_awal,
            'rute_tujuan' => $request->rute_tujuan,
        ]);

        return redirect()->route('rute.index')->with('success', 'Rute berhasil dibuat');
    }

    // Menampilkan detail rute
    public function show($id)
    {
        $rute = Rute::findOrFail($id);
        return view('rute.show', compact('rute'));
    }

    // Menampilkan form untuk mengedit rute
    public function edit(Rute $rute)
    {
        return view('rute.edit', compact('rute'));
    }

    // Memperbarui data rute
    public function update(Request $request, Rute $rute)
    {
        $request->validate([
            'rute_awal' => 'required|string|max:255',
            'rute_tujuan' => 'required|string|max:255',
        ]);

        $rute->update($request->all());

        return redirect()->route('rute.index')->with('success', 'Rute berhasil diperbarui');
    }

    // Menghapus rute
    public function destroy(Rute $rute)
    {
        $rute->delete();

        return redirect()->route('rute.index')->with('success', 'Rute berhasil dihapus');
    }
}