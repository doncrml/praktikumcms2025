<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengemudi;

class PengemudiController extends Controller
{
    public function index()
    {
        $pengemudi = Pengemudi::all();
        return view('pengemudi.index', compact('pengemudi'));
    }

    public function show($id)
    {
        $pengemudi = Pengemudi::find($id);
        return view('pengemudi.show', compact('pengemudi'));
    }

    public function create()
    {
        return view('pengemudi.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('pengemudi.index')->with('success', 'Data disimpan (dummy)');
    }

    public function edit($id)
    {
        $pengemudi = Pengemudi::find($id);
        return view('pengemudi.edit', compact('pengemudi'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('pengemudi.index')->with('success', 'Data diperbarui (dummy)');
    }

    public function destroy($id)
    {
        return redirect()->route('pengemudi.index')->with('success', 'Data dihapus (dummy)');
    }
}
