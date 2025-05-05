@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Edit Pengguna</div>
        <div class="card-body">
            <form method="POST" action="{{ route('pengguna.update', $pengguna->id_pengguna) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pengguna->nama }}" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $pengguna->alamat }}">
                </div>
                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ $pengguna->no_telepon }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
