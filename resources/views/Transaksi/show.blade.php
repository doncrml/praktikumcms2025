@extends('layouts.app')

@section('content')
    <h1>Detail Transaksi #{{ $transaksi['id'] }}</h1>
    <ul>
        <li>ID Pengguna: {{ $transaksi['id_pengguna'] }}</li>
        <li>ID Pengemudi: {{ $transaksi['id_pengemudi'] }}</li>
        <li>ID Kendaraan: {{ $transaksi['id_kendaraan'] }}</li>
        <li>ID Rute: {{ $transaksi['id_rute'] }}</li>
        <li>Total Biaya: Rp{{ number_format($transaksi['total_biaya'], 0, ',', '.') }}</li>
    </ul>
    <a href="{{ route('transaksi.index') }}">Kembali</a>
@endsection
