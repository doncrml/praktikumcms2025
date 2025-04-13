@extends('layouts.app')

@section('content')
<h2>Edit Kendaraan</h2>
<form method="POST" action="{{ route('kendaraan.update', $kendaraan['plat_nomor']) }}">
    @csrf
    @method('PUT')
    <input type="text" name="jenis_kendaraan" value="{{ $kendaraan['jenis_kendaraan'] }}"><br>
    <input type="number" name="tahun_kendaraan" value="{{ $kendaraan['tahun_kendaraan'] }}"><br>
    <input type="number" name="id_pengemudi" value="{{ $kendaraan['id_pengemudi'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
