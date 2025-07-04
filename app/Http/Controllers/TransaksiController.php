<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pengguna;
use App\Models\Pengemudi;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
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

            Log::info('Transaksi berhasil ditambahkan', $request->all());

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan transaksi: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan transaksi.');
        }
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
        try {
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

            Log::info('Transaksi berhasil diperbarui', ['id' => $id, 'data' => $request->all()]);

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui transaksi: ' . $e->getMessage(), ['id' => $id, 'data' => $request->all()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui transaksi.');
        }
    }

    public function destroy($id)
    {
        try {
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->delete();

            Log::info('Transaksi berhasil dihapus', ['id' => $id]);

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus transaksi: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus transaksi.');
        }
    }

    public function cek($id)
    {
        try {
            $transaksi = Transaksi::with(['pengguna', 'pengemudi', 'rute'])->findOrFail($id);
            return view('transaksi.cek', compact('transaksi'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.transaksi-not-found!!!', [], 404);
        }
    }
}
