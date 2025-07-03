@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-danger py-3">Pengemudi Tidak Ditemukan</h4>
    <div class="alert alert-warning">
        <p>Pengemudi dengan ID tersebut tidak tersedia.</p>
        <a href="{{ route('pengemudi.index') }}" class="btn btn-primary">Kembali ke Daftar Pengemudi</a>
    </div>
</div>
@endsection
