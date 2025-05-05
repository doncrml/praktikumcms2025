@extends('layouts.app')

@section('content')
<!-- Start Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Tambah Transaksi</h4>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Pengguna</label>
                    <select name="id_pengguna" class="form-select" required>
                        <option value="">-- Pilih Pengguna --</option>
                        @foreach ($pengguna as $u)
                            <option value="{{ $u->id_pengguna }}" {{ old('id_pengguna') == $u->id_pengguna ? 'selected' : '' }}>
                                {{ $u->id_pengguna }} - {{ $u->nama }}
                            </option>
                        @endforeach
                    </select>
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

                <div class="mb-3">
                    <label class="form-label">Rute</label>
                    <select name="id_rute" class="form-select" required>
                        <option value="">-- Pilih Rute --</option>
                        @foreach ($rute as $r)
                            <option value="{{ $r->id_rute }}" {{ old('id_rute') == $r->id_rute ? 'selected' : '' }}>
                                {{ $r->id_rute }} - {{ $r->rute_awal }} → {{ $r->rute_tujuan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya</label>
                    <input type="number" name="biaya" value="{{ old('biaya') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal & Waktu</label>
                    <input type="datetime-local" name="tanggal_waktu" value="{{ old('tanggal_waktu') }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection