@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-danger py-3">Pengguna Tidak Ditemukan</h4>
    <div class="alert alert-warning">
        <p>Pengguna dengan ID tersebut tidak tersedia.</p>
        <a href="{{ route('pengguna.index') }}" class="btn btn-primary">Kembali ke Daftar Pengguna</a>
    </div>
</div>
@endsection
