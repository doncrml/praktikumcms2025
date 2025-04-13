@extends('layouts.app')

@section('content')
<h2>Detail Kendaraan</h2>
<p><strong>Plat Nomor:</strong> {{ $kendaraan['plat_nomor'] }}</p>
<p><strong>Jenis:</strong> {{ $kendaraan['jenis_kendaraan'] }}</p>
<p><strong>Tahun:</strong> {{ $kendaraan['tahun_kendaraan'] }}</p>
<p><strong>ID Pengemudi:</strong> {{ $kendaraan['id_pengemudi'] }}</p>
<a href="{{ route('kendaraan.edit', $kendaraan['plat_nomor']) }}">Edit</a>
<form action="{{ route('kendaraan.destroy', $kendaraan['plat_nomor']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
@endsection
