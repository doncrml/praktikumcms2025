<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('transaksi.index')->with('success', 'Data disimpan (dummy)');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('transaksi.index')->with('success', 'Data diperbarui (dummy)');
    }

    public function destroy($id)
    {
        return redirect()->route('transaksi.index')->with('success', 'Data dihapus (dummy)');
    }
}
