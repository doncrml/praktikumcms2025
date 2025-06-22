@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-danger py-3">Transaksi Tidak Ditemukan</h4>
    <div class="alert alert-warning">
        <p>Transaksi dengan ID tersebut tidak tersedia.</p>
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Kembali ke Daftar Transaksi</a>
    </div>
</div>
@endsection
