@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Kendaraan</h4>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">Tambah Kendaraan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Plat Nomor</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>Pengemudi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kendaraan as $k)
                        <tr>
                            <td>{{ $k->plat_nomor }}</td>
                            <td>{{ $k->jenis_kendaraan }}</td>
                            <td>{{ $k->tahun_kendaraan }}</td>
                            <td>{{ $k->pengemudi->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('kendaraan.show', $k) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('kendaraan.edit', $k) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('kendaraan.destroy', $k) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
