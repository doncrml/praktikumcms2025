@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="py-3">Detail Pengemudi</h4>
    <div class="card p-3">
        <ul class="list-unstyled">
            <li><strong>ID Pengemudi:</strong> {{ $pengemudi->id_pengemudi }}</li>
            <li><strong>Nama:</strong> {{ $pengemudi->nama }}</li>
            <li><strong>No SIM:</strong> {{ $pengemudi->no_sim }}</li>
        </ul>
    </div>
</div>
@endsection
