@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Daftar Transaksi</h5>
                        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Pengguna</th>
                                    <th>Pengemudi</th>
                                    <th>Rute</th>
                                    <th>Biaya</th>
                                    <th>Tanggal & Waktu</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksi as $t)
                                    <tr>
                                        <td>{{ $t->id_transaksi }}</td>
                                        <td>{{ $t->pengguna->nama ?? 'N/A' }}</td>
                                        <td>{{ $t->pengemudi->nama ?? 'N/A' }}</td>
                                        <td>{{ $t->rute->nama ?? 'N/A' }}</td>
                                        <td>Rp {{ number_format($t->biaya, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($t->tanggal_waktu)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('transaksi.show', ['transaksi' => $t->id_transaksi]) }}" class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('transaksi.edit', ['transaksi' => $t->id_transaksi]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('transaksi.destroy', ['transaksi' => $t->id_transaksi]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data transaksi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
