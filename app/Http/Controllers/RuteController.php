<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;

class RuteController extends Controller
{
    public function index()
    {
        $rute = Rute::all();
        return view('rute.index', compact('rute'));
    }

    public function show($id)
    {
        $rute = Rute::find($id);
        return view('rute.show', compact('rute'));
    }

    public function create()
    {
        return view('rute.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('rute.index')->with('success', 'Data disimpan (dummy)');
    }

    public function edit($id)
    {
        $rute = Rute::find($id);
        return view('rute.edit', compact('rute'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('rute.index')->with('success', 'Data diperbarui (dummy)');
    }

    public function destroy($id)
    {
        return redirect()->route('rute.index')->with('success', 'Data dihapus (dummy)');
    }
}
