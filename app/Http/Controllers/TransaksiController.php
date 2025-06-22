<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pengguna;
use App\Models\Pengemudi;
use App\Models\Rute;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['pengguna', 'pengemudi', 'rute'])->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pengguna = Pengguna::all();
        $pengemudi = Pengemudi::all();
        $rute = Rute::all();
        return view('transaksi.create', compact('pengguna', 'pengemudi', 'rute'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'id_pengemudi' => 'required|exists:pengemudi,id_pengemudi',
            'id_rute' => 'required|exists:rute,id_rute',
            'biaya' => 'required|numeric',
            'tanggal_waktu' => 'required|date',
        ]);

        Transaksi::create([
            'id_pengguna' => $request->id_pengguna,
            'id_pengemudi' => $request->id_pengemudi,
            'id_rute' => $request->id_rute,
            'biaya' => $request->biaya,
            'tanggal_waktu' => $request->tanggal_waktu,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['pengguna', 'pengemudi', 'rute'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pengguna = Pengguna::all();
        $pengemudi = Pengemudi::all();
        $rute = Rute::all();
        return view('transaksi.edit', compact('transaksi', 'pengguna', 'pengemudi', 'rute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'id_pengemudi' => 'required|exists:pengemudi,id_pengemudi',
            'id_rute' => 'required|exists:rute,id_rute',
            'biaya' => 'required|numeric',
            'tanggal_waktu' => 'required|date',
        ]);
        
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'id_pengguna' => $request->id_pengguna,
            'id_pengemudi' => $request->id_pengemudi,
            'id_rute' => $request->id_rute,
            'biaya' => $request->biaya,
            'tanggal_waktu' => $request->tanggal_waktu,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
    public function cek($id)
    {
    try {
        $transaksi = Transaksi::with(['pengguna', 'pengemudi', 'rute'])->findOrFail($id);
        return view('transaksi.cek', compact('transaksi'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->view('errors.transaksi-not-found', [], 404);
    }
}


    
}