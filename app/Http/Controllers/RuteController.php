<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RuteController extends Controller
{
    public function index()
    {
        $rutes = Rute::all();
        return view('rute.index', compact('rutes'));
    }

    public function create()
    {
        return view('rute.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'rute_awal' => 'required|string|max:255',
                'rute_tujuan' => 'required|string|max:255',
            ]);

            $maxId = Rute::max('id_rute') ?? 0;
            $newId = $maxId + 1;

            Rute::create([
                'id_rute' => $newId,
                'rute_awal' => $request->rute_awal,
                'rute_tujuan' => $request->rute_tujuan,
            ]);

            Log::info('Rute berhasil ditambahkan', $request->all());

            return redirect()->route('rute.index')->with('success', 'Rute berhasil dibuat');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan rute: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambah rute.');
        }
    }

    public function show($id)
    {
        $rute = Rute::findOrFail($id);
        return view('rute.show', compact('rute'));
    }

    public function edit(Rute $rute)
    {
        return view('rute.edit', compact('rute'));
    }

    public function update(Request $request, Rute $rute)
    {
        try {
            $request->validate([
                'rute_awal' => 'required|string|max:255',
                'rute_tujuan' => 'required|string|max:255',
            ]);

            $rute->update($request->all());

            Log::info('Rute berhasil diperbarui', ['id' => $rute->id_rute]);

            return redirect()->route('rute.index')->with('success', 'Rute berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui rute: ' . $e->getMessage(), ['id' => $rute->id_rute]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui rute.');
        }
    }

    public function destroy(Rute $rute)
    {
        try {
            $rute->delete();

            Log::info('Rute berhasil dihapus', ['id' => $rute->id_rute]);

            return redirect()->route('rute.index')->with('success', 'Rute berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus rute: ' . $e->getMessage(), ['id' => $rute->id_rute]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus rute.');
        }
    }
}
