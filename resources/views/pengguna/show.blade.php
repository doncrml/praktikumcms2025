@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Detail Pengguna</div>
        <div class="card-body">
            <p><strong>ID Pengguna:</strong> {{ $pengguna->id_pengguna }}</p>
            <p><strong>Nama:</strong> {{ $pengguna->nama }}</p>
            <p><strong>Alamat:</strong> {{ $pengguna->alamat }}</p>
            <p><strong>No Telepon:</strong> {{ $pengguna->no_telepon }}</p>
            <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
