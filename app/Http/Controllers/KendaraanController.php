<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Pengemudi;
use Illuminate\Support\Facades\Log;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::with('pengemudi')->get();
        return view('kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        $pengemudi = Pengemudi::all();
        return view('kendaraan.create', compact('pengemudi'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'plat_nomor' => 'required|string|unique:kendaraan,plat_nomor',
                'jenis_kendaraan' => 'required|string|max:100',
                'tahun_kendaraan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
                'id_pengemudi' => 'required|exists:pengemudi,id_pengemudi',
            ]);

            Kendaraan::create($request->only([
                'plat_nomor', 'jenis_kendaraan', 'tahun_kendaraan', 'id_pengemudi'
            ]));

            Log::info('Kendaraan berhasil ditambahkan', $request->all());

            return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan kendaraan: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambah kendaraan.');
        }
    }

    public function show($plat)
    {
        $kendaraan = Kendaraan::with('pengemudi')->findOrFail($plat);
        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit($plat)
    {
        $kendaraan = Kendaraan::findOrFail($plat);
        $pengemudi = Pengemudi::all();
        return view('kendaraan.edit', compact('kendaraan', 'pengemudi'));
    }

    public function update(Request $request, $plat)
    {
        try {
            $request->validate([
                'jenis_kendaraan' => 'required|string|max:100',
                'tahun_kendaraan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
                'id_pengemudi' => 'required|exists:pengemudi,id_pengemudi',
            ]);

            $kendaraan = Kendaraan::findOrFail($plat);
            $kendaraan->update($request->only([
                'jenis_kendaraan', 'tahun_kendaraan', 'id_pengemudi'
            ]));

            Log::info('Kendaraan berhasil diperbarui', ['plat_nomor' => $plat]);

            return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui kendaraan: ' . $e->getMessage(), ['plat_nomor' => $plat]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui kendaraan.');
        }
    }

    public function destroy($plat)
    {
        try {
            $kendaraan = Kendaraan::findOrFail($plat);
            $kendaraan->delete();

            Log::info('Kendaraan berhasil dihapus', ['plat_nomor' => $plat]);

            return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus kendaraan: ' . $e->getMessage(), ['plat_nomor' => $plat]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kendaraan.');
        }
    }
    public function cek($plat)
    {
        try {
            $kendaraan = Kendaraan::with('pengemudi')->findOrFail($plat);
            return view('kendaraan.cek', compact('kendaraan'));
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.kendaraan-not-found', [], 404);
        }
    }
}
