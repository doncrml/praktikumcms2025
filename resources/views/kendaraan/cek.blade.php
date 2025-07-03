@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="py-3">Detail Kendaraan</h4>
    <div class="card p-3">
        <ul class="list-unstyled">
            <li><strong>Plat Nomor:</strong> {{ $kendaraan->plat_nomor }}</li>
            <li><strong>Jenis:</strong> {{ $kendaraan->jenis_kendaraan }}</li>
            <li><strong>Tahun:</strong> {{ $kendaraan->tahun_kendaraan }}</li>
            <li><strong>Pengemudi:</strong> {{ $kendaraan->pengemudi->nama ?? 'Tidak ada' }}</li>
        </ul>
    </div>
</div>
@endsection
