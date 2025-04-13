<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function show($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.show', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('pengguna.index')->with('success', 'Data disimpan (dummy)');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('pengguna.index')->with('success', 'Data diperbarui (dummy)');
    }

    public function destroy($id)
    {
        return redirect()->route('pengguna.index')->with('success', 'Data dihapus (dummy)');
    }
}
