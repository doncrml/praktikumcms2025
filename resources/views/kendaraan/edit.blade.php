@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Kendaraan</h4>

    <form action="{{ route('kendaraan.update', $kendaraan->Plat_Nomor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Jenis Kendaraan</label>
            <input type="text" name="Jenis_Kendaraan" class="form-control" value="{{ $kendaraan->Jenis_Kendaraan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Kendaraan</label>
            <input type="number" name="Tahun_Kendaraan" class="form-control" value="{{ $kendaraan->Tahun_Kendaraan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ID Pengemudi</label>
            <select name="ID_Pengemudi" class="form-select" required>
                @foreach ($pengemudi as $p)
                    <option value="{{ $p->id_pengemudi }}" {{ $p->id_pengemudi == $kendaraan->ID_Pengemudi ? 'selected' : '' }}>
                        {{ $p->id_pengemudi }} - {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
