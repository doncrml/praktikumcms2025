@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-danger py-3">Gambar Tidak Ditemukan</h4>
    <div class="alert alert-warning">
        <p>Gambar dengan ID tersebut tidak tersedia.</p>
        <a href="{{ url('/upload') }}" class="btn btn-primary">Kembali ke Upload</a>
    </div>
</div>
@endsection
