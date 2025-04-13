@extends('layouts.app')

@section('content')
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <label>ID Pengguna: <input type="number" name="id_pengguna"></label><br>
        <label>ID Pengemudi: <input type="number" name="id_pengemudi"></label><br>
        <label>ID Kendaraan: <input type="text" name="id_kendaraan"></label><br>
        <label>ID Rute: <input type="number" name="id_rute"></label><br>
        <label>Total Biaya: <input type="number" name="total_biaya"></label><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('transaksi.index') }}">Kembali</a>
@endsection
