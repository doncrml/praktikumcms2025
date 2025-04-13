@extends('layouts.app')

@section('content')
<h2>Tambah Kendaraan</h2>
<form method="POST" action="{{ route('kendaraan.store') }}">
    @csrf
    <input type="text" name="plat_nomor" placeholder="Plat Nomor"><br>
    <input type="text" name="jenis_kendaraan" placeholder="Jenis Kendaraan"><br>
    <input type="number" name="tahun_kendaraan" placeholder="Tahun"><br>
    <input type="number" name="id_pengemudi" placeholder="ID Pengemudi"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
