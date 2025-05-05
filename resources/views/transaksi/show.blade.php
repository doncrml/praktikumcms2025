@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Detail Transaksi</h5>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th width="200px">ID Transaksi</th>
                                <td>{{ $transaksi->id_transaksi }}</td>
                            </tr>
                            <tr>
                                <th>Pengguna</th>
                                <td>
                                    {{ $transaksi->pengguna->nama ?? 'N/A' }}
                                    <small class="text-muted">(ID: {{ $transaksi->id_pengguna }})</small>
                                </td>
                            </tr>
                            <tr>
                                <th>Pengemudi</th>
                                <td>
                                    {{ $transaksi->pengemudi->nama ?? 'N/A' }}
                                    <small class="text-muted">(ID: {{ $transaksi->id_pengemudi }})</small>
                                </td>
                            </tr>
                            <tr>
                                <th>Rute</th>
                                <td>
                                    {{ $transaksi->rute->nama ?? 'Rute #' . $transaksi->id_rute }}
                                    <small class="text-muted">(ID: {{ $transaksi->id_rute }})</small>
                                </td>
                            </tr>
                            <tr>
                                <th>Biaya</th>
                                <td>Rp {{ number_format($transaksi->biaya, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal & Waktu</th>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_waktu)->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui Pada</th>
                                <td>{{ $transaksi->updated_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('transaksi.edit', ['transaksi' => $transaksi->id_transaksi]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('transaksi.destroy', ['transaksi' => $transaksi->id_transaksi]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
