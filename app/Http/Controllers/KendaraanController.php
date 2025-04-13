<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraan'));
    }

    public function show($plat_nomor)
    {
        $kendaraan = Kendaraan::find($plat_nomor);
        return view('kendaraan.show', compact('kendaraan'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('kendaraan.index')->with('success', 'Data disimpan (dummy)');
    }

    public function edit($plat_nomor)
    {
        $kendaraan = Kendaraan::find($plat_nomor);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, $plat_nomor)
    {
        return redirect()->route('kendaraan.index')->with('success', 'Data diperbarui (dummy)');
    }

    public function destroy($plat_nomor)
    {
        return redirect()->route('kendaraan.index')->with('success', 'Data dihapus (dummy)');
    }
}
