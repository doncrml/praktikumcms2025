@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="py-3">Detail Transaksi</h4>
    <div class="card p-3">
        <ul class="list-unstyled">
            <li><strong>ID Transaksi:</strong> {{ $transaksi->id_transaksi }}</li>
            <li><strong>Pengguna:</strong> {{ $transaksi->pengguna->nama ?? 'Tidak ada' }}</li>
            <li><strong>Pengemudi:</strong> {{ $transaksi->pengemudi->nama ?? 'Tidak ada' }}</li>
            <li><strong>Rute:</strong> {{ $transaksi->rute->nama ?? 'Tidak ada' }}</li>
            <li><strong>Biaya:</strong> Rp {{ number_format($transaksi->biaya, 0, ',', '.') }}</li>
            <li><strong>Tanggal & Waktu:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_waktu)->format('d-m-Y H:i') }}</li>
        </ul>
    </div>
</div>
@endsection
