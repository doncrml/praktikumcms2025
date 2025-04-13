@extends('layouts.app')

@section('content')
<h2>Daftar Kendaraan</h2>
<a href="{{ route('kendaraan.create') }}">Tambah Kendaraan</a>
<ul>
    @foreach ($kendaraan as $k)
        <li>
            <a href="{{ route('kendaraan.show', $k['plat_nomor']) }}">{{ $k['plat_nomor'] }} - {{ $k['jenis_kendaraan'] }}</a>
        </li>
    @endforeach
</ul>
@endsection
