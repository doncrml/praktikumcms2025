@extends('layouts.app')

@section('content')
<h2>Tambah Rute</h2>
<form method="POST" action="{{ route('rute.store') }}">
    @csrf
    <input type="text" name="rute_awal" placeholder="Rute Awal"><br>
    <input type="text" name="rute_tujuan" placeholder="Rute Tujuan"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
