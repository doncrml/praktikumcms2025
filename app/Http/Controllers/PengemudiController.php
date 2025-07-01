<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengemudi;
use Illuminate\Support\Facades\Log;

class PengemudiController extends Controller
{
    public function index()
    {
        $pengemudi = Pengemudi::all();
        return view('pengemudi.index', compact('pengemudi'));
    }

    public function create()
    {
        return view('pengemudi.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:100',
                'no_sim' => 'required|string|max:20',
            ]);

            Pengemudi::create($request->all());

            Log::info('Pengemudi berhasil ditambahkan', $request->all());

            return redirect()->route('pengemudi.index')->with('success', 'Data pengemudi berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan pengemudi: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data pengemudi.');
        }
    }

    public function show($id)
    {
        $pengemudi = Pengemudi::findOrFail($id);
        return view('pengemudi.show', compact('pengemudi'));
    }

    public function edit($id)
    {
        $pengemudi = Pengemudi::findOrFail($id);
        return view('pengemudi.edit', compact('pengemudi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:100',
                'no_sim' => 'required|string|max:20',
            ]);

            $pengemudi = Pengemudi::findOrFail($id);
            $pengemudi->update($request->all());

            Log::info('Pengemudi berhasil diperbarui', ['id' => $id]);

            return redirect()->route('pengemudi.index')->with('success', 'Data pengemudi berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui pengemudi: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data pengemudi.');
        }
    }

    public function destroy($id)
    {
        try {
            $pengemudi = Pengemudi::findOrFail($id);
            $pengemudi->delete();

            Log::info('Pengemudi berhasil dihapus', ['id' => $id]);

            return redirect()->route('pengemudi.index')->with('success', 'Data pengemudi berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus pengemudi: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data pengemudi.');
        }
    }
}
