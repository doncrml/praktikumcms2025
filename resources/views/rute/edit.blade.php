@extends('layouts.app')

@section('content')
<!-- Start Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Rute</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Edit Rute</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('rute.update', $rute) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="rute_awal" class="form-label">Rute Awal</label>
                    <input type="text" name="rute_awal" id="rute_awal" class="form-control" value="{{ $rute->rute_awal }}" required>
                </div>
                <div class="mb-3">
                    <label for="rute_tujuan" class="form-label">Rute Tujuan</label>
                    <input type="text" name="rute_tujuan" id="rute_tujuan" class="form-control" value="{{ $rute->rute_tujuan }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
