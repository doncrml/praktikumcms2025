<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Log;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_pengguna' => 'required|integer|unique:pengguna,id_pengguna',
                'nama' => 'required|string|max:100',
                'alamat' => 'nullable|string|max:255',
                'no_telepon' => 'nullable|string|max:15',
            ]);

            Pengguna::create($request->all());

            Log::info('Pengguna berhasil ditambahkan', $request->all());

            return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan pengguna: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data pengguna.');
        }
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
        try {
            $request->validate([
                'nama' => 'required|string|max:100',
                'alamat' => 'nullable|string|max:255',
                'no_telepon' => 'nullable|string|max:15',
            ]);

            $pengguna = Pengguna::findOrFail($id);
            $pengguna->update($request->all());

            Log::info('Pengguna berhasil diperbarui', ['id' => $id]);

            return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui pengguna: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data pengguna.');
        }
    }

    public function destroy($id)
    {
        try {
            $pengguna = Pengguna::findOrFail($id);
            $pengguna->delete();

            Log::info('Pengguna berhasil dihapus', ['id' => $id]);

            return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus pengguna: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data pengguna.');
        }
    }
    
    public function cek($id)
    {
        try {
            $pengguna = Pengguna::findOrFail($id);
            return view('pengguna.cek', compact('pengguna'));
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.pengguna-not-found', [], 404);
        }
    }

}
