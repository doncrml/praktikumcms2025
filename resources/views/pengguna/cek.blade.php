@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="py-3">Detail Pengguna</h4>
    <div class="card p-3">
        <ul class="list-unstyled">
            <li><strong>ID Pengguna:</strong> {{ $pengguna->id_pengguna }}</li>
            <li><strong>Nama:</strong> {{ $pengguna->nama }}</li>
            <li><strong>Alamat:</strong> {{ $pengguna->alamat ?? 'Tidak ada' }}</li>
            <li><strong>No Telepon:</strong> {{ $pengguna->no_telepon ?? 'Tidak ada' }}</li>
        </ul>
    </div>
</div>
@endsection
