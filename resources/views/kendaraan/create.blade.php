@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Kendaraan</h4>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Plat Nomor</label>
            <input type="text" name="plat_nomor" value="{{ old('plat_nomor') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kendaraan</label>
            <input type="text" name="jenis_kendaraan" value="{{ old('jenis_kendaraan') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Kendaraan</label>
            <input type="number" name="tahun_kendaraan" value="{{ old('tahun_kendaraan') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengemudi</label>
            <select name="id_pengemudi" class="form-select" required>
                <option value="">-- Pilih Pengemudi --</option>
                @foreach ($pengemudi as $p)
                    <option value="{{ $p->id_pengemudi }}" {{ old('id_pengemudi') == $p->id_pengemudi ? 'selected' : '' }}>
                        {{ $p->id_pengemudi }} - {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
