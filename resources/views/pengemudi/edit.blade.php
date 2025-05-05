@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Edit Pengemudi</div>
        <div class="card-body">
            <form method="POST" action="{{ route('pengemudi.update', $pengemudi->id_pengemudi) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $pengemudi->nama }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No SIM</label>
                    <input type="text" name="no_sim" value="{{ $pengemudi->no_sim }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('pengemudi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
