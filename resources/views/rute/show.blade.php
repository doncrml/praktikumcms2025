@extends('layouts.app')

@section('content')
<!-- Start Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Detail Rute</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detail Rute #{{ $rute->id_rute }}</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="rute_awal" class="form-label">Rute Awal</label>
                <p>{{ $rute->rute_awal }}</p>
            </div>
            <div class="mb-3">
                <label for="rute_tujuan" class="form-label">Rute Tujuan</label>
                <p>{{ $rute->rute_tujuan }}</p>
            </div>
            <a href="{{ route('rute.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
