<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Pengemudi;

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
        $request->validate([
            'plat_nomor' => 'required|string|unique:kendaraan,plat_nomor',
            'jenis_kendaraan' => 'required|string|max:100',
            'tahun_kendaraan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'id_pengemudi' => 'required|exists:pengemudi,id_pengemudi',
        ]);

        Kendaraan::create($request->only([
            'plat_nomor', 'jenis_kendaraan', 'tahun_kendaraan', 'id_pengemudi'
        ]));

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan.');
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
        $request->validate([
            'jenis_kendaraan' => 'required|string|max:100',
            'tahun_kendaraan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'id_pengemudi' => 'required|exists:pengemudi,id_pengemudi',
        ]);

        $kendaraan = Kendaraan::findOrFail($plat);
        $kendaraan->update($request->only([
            'jenis_kendaraan', 'tahun_kendaraan', 'id_pengemudi'
        ]));

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy($plat)
    {
        $kendaraan = Kendaraan::findOrFail($plat);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus.');
    }
}
