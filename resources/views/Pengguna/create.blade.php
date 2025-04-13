@extends('layouts.app')

@section('content')
<h2>Tambah Pengguna</h2>
<form method="POST" action="{{ route('pengguna.store') }}">
    @csrf
    <input type="text" name="nama" placeholder="Nama"><br>
    <input type="text" name="alamat" placeholder="Alamat"><br>
    <input type="text" name="no_telepon" placeholder="No Telepon"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
