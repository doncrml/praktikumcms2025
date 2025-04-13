@extends('layouts.app')

@section('content')
<h2>Detail Pengguna</h2>
<p><strong>Nama:</strong> {{ $pengguna['nama'] }}</p>
<p><strong>Alamat:</strong> {{ $pengguna['alamat'] }}</p>
<p><strong>No Telepon:</strong> {{ $pengguna['no_telepon'] }}</p>
<a href="{{ route('pengguna.edit', $pengguna['id']) }}">Edit</a>
<form action="{{ route('pengguna.destroy', $pengguna['id']) }}" method="POST" style="margin-top:10px;">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
@endsection
