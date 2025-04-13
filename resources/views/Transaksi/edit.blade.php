@extends('layouts.app')

@section('content')
    <h1>Edit Transaksi #{{ $transaksi['id'] }}</h1>
    <form action="{{ route('transaksi.update', $transaksi['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <label>ID Pengguna: <input type="number" name="id_pengguna" value="{{ $transaksi['id_pengguna'] }}"></label><br>
        <label>ID Pengemudi: <input type="number" name="id_pengemudi" value="{{ $transaksi['id_pengemudi'] }}"></label><br>
        <label>ID Kendaraan: <input type="text" name="id_kendaraan" value="{{ $transaksi['id_kendaraan'] }}"></label><br>
        <label>ID Rute: <input type="number" name="id_rute" value="{{ $transaksi['id_rute'] }}"></label><br>
        <label>Total Biaya: <input type="number" name="total_biaya" value="{{ $transaksi['total_biaya'] }}"></label><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('transaksi.index') }}">Kembali</a>
@endsection
