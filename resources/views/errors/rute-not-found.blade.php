@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-danger py-3">Rute Tidak Ditemukan</h4>
    <div class="alert alert-warning">
        <p>Rute dengan ID tersebut tidak tersedia.</p>
        <a href="{{ route('rute.index') }}" class="btn btn-primary">Kembali ke Daftar Rute</a>
    </div>
</div>
@endsection
