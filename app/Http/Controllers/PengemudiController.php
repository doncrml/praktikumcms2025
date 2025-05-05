<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengemudi;

class PengemudiController extends Controller
{
    // Menampilkan daftar pengemudi
    public function index()
    {
        $pengemudi = Pengemudi::all(); // Mengambil semua data pengemudi dari database
        return view('pengemudi.index', compact('pengemudi'));
    }

    // Menampilkan form untuk membuat pengemudi baru
    public function create()
    {
        return view('pengemudi.create');
    }

    // Menyimpan pengemudi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_sim' => 'required|string|max:20',
        ]);

        // Membuat pengemudi baru di database
        Pengemudi::create($request->all());

        return redirect()->route('pengemudi.index')->with('success', 'Data pengemudi berhasil ditambahkan.');
    }

    // Menampilkan detail pengemudi
    public function show($id)
    {
        $pengemudi = Pengemudi::findOrFail($id); // Mencari pengemudi berdasarkan ID
        return view('pengemudi.show', compact('pengemudi'));
    }

    // Menampilkan form untuk mengedit pengemudi
    public function edit($id)
    {
        $pengemudi = Pengemudi::findOrFail($id); // Mencari pengemudi berdasarkan ID
        return view('pengemudi.edit', compact('pengemudi'));
    }

    // Mengupdate pengemudi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_sim' => 'required|string|max:20',
        ]);

        $pengemudi = Pengemudi::findOrFail($id);
        $pengemudi->update($request->all());

        return redirect()->route('pengemudi.index')->with('success', 'Data pengemudi berhasil diperbarui.');
    }

    // Menghapus pengemudi
    public function destroy($id)
    {
        $pengemudi = Pengemudi::findOrFail($id);
        $pengemudi->delete();

        return redirect()->route('pengemudi.index')->with('success', 'Data pengemudi berhasil dihapus.');
    }
}
