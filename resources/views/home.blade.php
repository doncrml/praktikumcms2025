@extends('layouts.app')

@section('content')
    <h3>Selamat Datang di CMS Ojek Online</h3>
    <p>Silakan pilih menu untuk mengelola data:</p>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('pengguna.index') }}">📋 Kelola Pengguna</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('pengemudi.index') }}">👨‍✈️ Kelola Pengemudi</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('kendaraan.index') }}">🚗 Kelola Kendaraan</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('rute.index') }}">🗺️ Kelola Rute</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('transaksi.index') }}">💸 Kelola Transaksi</a>
        </li>
    </ul>
@endsection
