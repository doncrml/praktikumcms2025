<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        // Ambil semua data pengguna
        $pengguna = Pengguna::all();

        // Kirim ke view pengguna.index
        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengguna' => 'required|integer|unique:pengguna,id_pengguna',
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        Pengguna::create($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.show', compact('pengguna'));
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
