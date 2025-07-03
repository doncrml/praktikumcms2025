@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="py-3">Detail Rute</h4>
    <div class="card p-3">
        <ul class="list-unstyled">
            <li><strong>ID Rute:</strong> {{ $rute->id_rute }}</li>
            <li><strong>Rute Awal:</strong> {{ $rute->rute_awal }}</li>
            <li><strong>Rute Tujuan:</strong> {{ $rute->rute_tujuan }}</li>
        </ul>
    </div>
</div>
@endsection
