@extends('layouts.app')

@section('content')
<h2>Edit Pengguna</h2>
<form method="POST" action="{{ route('pengguna.update', $pengguna['id']) }}">
    @csrf
    @method('PUT')
    <input type="text" name="nama" placeholder="Nama" value="{{ $pengguna['nama'] }}"><br>
    <input type="text" name="alamat" placeholder="Alamat" value="{{ $pengguna['alamat'] }}"><br>
    <input type="text" name="no_telepon" placeholder="No Telepon" value="{{ $pengguna['no_telepon'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
