@extends('layouts.app')

@section('content')
<h2>Daftar Pengguna</h2>
<a href="{{ route('pengguna.create') }}">Tambah Pengguna</a>
<ul>
    @foreach ($pengguna as $p)
        <li>
            <a href="{{ route('pengguna.show', $p['id']) }}">{{ $p['nama'] }}</a>
        </li>
    @endforeach
</ul>
@endsection
