@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-danger py-3">Kendaraan Tidak Ditemukan</h4>
    <div class="alert alert-warning">
        <p>Kendaraan dengan Plat Nomor tersebut tidak tersedia.</p>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-primary">Kembali ke Daftar Kendaraan</a>
    </div>
</div>
@endsection
