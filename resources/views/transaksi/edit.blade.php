@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Edit Transaksi</h5>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transaksi.update', ['transaksi' => $transaksi->id_transaksi]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="id_pengguna">Pengguna</label>
                            <select name="id_pengguna" id="id_pengguna" class="form-control @error('id_pengguna') is-invalid @enderror" required>
                                <option value="">-- Pilih Pengguna --</option>
                                @foreach($pengguna as $p)
                                    <option value="{{ $p->id_pengguna }}" {{ (old('id_pengguna') ?? $transaksi->id_pengguna) == $p->id_pengguna ? 'selected' : '' }}>
                                        {{ $p->nama }} (ID: {{ $p->id_pengguna }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_pengguna')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="id_pengemudi">Pengemudi</label>
                            <select name="id_pengemudi" id="id_pengemudi" class="form-control @error('id_pengemudi') is-invalid @enderror" required>
                                <option value="">-- Pilih Pengemudi --</option>
                                @foreach($pengemudi as $p)
                                    <option value="{{ $p->id_pengemudi }}" {{ (old('id_pengemudi') ?? $transaksi->id_pengemudi) == $p->id_pengemudi ? 'selected' : '' }}>
                                        {{ $p->nama }} (ID: {{ $p->id_pengemudi }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_pengemudi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="id_rute">Rute</label>
                            <select name="id_rute" id="id_rute" class="form-control @error('id_rute') is-invalid @enderror" required>
                                <option value="">-- Pilih Rute --</option>
                                @foreach($rute as $r)
                                    <option value="{{ $r->id_rute }}" {{ (old('id_rute') ?? $transaksi->id_rute) == $r->id_rute ? 'selected' : '' }}>
                                        {{ $r->nama ?? 'Rute #'.$r->id_rute }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_rute')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="biaya">Biaya</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="biaya" id="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya') ?? $transaksi->biaya }}" min="0" step="0.01" required>
                            </div>
                            @error('biaya')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="tanggal_waktu">Tanggal & Waktu</label>
                            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="form-control @error('tanggal_waktu') is-invalid @enderror" 
                                value="{{ old('tanggal_waktu') ?? \Carbon\Carbon::parse($transaksi->tanggal_waktu)->format('Y-m-d\TH:i') }}" required>
                            @error('tanggal_waktu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
