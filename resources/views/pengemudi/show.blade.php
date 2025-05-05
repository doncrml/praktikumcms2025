@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Detail Pengemudi</div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $pengemudi->id_pengemudi }}</p>
            <p><strong>Nama:</strong> {{ $pengemudi->nama }}</p>
            <p><strong>No SIM:</strong> {{ $pengemudi->no_sim }}</p>

            <a href="{{ route('pengemudi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
