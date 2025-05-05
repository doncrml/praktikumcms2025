@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Rute Baru</h4>
    <a href="{{ route('rute.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('rute.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="rute_awal" class="form-label">Rute Awal</label>
                    <input type="text" class="form-control @error('rute_awal') is-invalid @enderror" id="rute_awal" name="rute_awal" value="{{ old('rute_awal') }}" required>
                    @error('rute_awal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="rute_tujuan" class="form-label">Rute Tujuan</label>
                    <input type="text" class="form-control @error('rute_tujuan') is-invalid @enderror" id="rute_tujuan" name="rute_tujuan" value="{{ old('rute_tujuan') }}" required>
                    @error('rute_tujuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

              

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection