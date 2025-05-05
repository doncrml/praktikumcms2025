@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Detail Kendaraan</h4>

    <div class="card">
        <div class="card-body">
            <p><strong>Plat Nomor:</strong> {{ $kendaraan->Plat_Nomor }}</p>
            <p><strong>Jenis:</strong> {{ $kendaraan->Jenis_Kendaraan }}</p>
            <p><strong>Tahun:</strong> {{ $kendaraan->Tahun_Kendaraan }}</p>
            <p><strong>Pengemudi:</strong> {{ $kendaraan->pengemudi->nama ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
