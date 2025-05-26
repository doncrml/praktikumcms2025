@extends('layouts.app')

@section('content')
<!-- Start Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Daftar Rute</h4>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bx bx-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <a href="{{ route('rute.create') }}" class="btn btn-primary mb-3">Tambah Rute</a>
    
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tabel Rute</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rute Awal</th>
                        <th>Rute Tujuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rutes as $rute)
                    <tr>
                        <td>{{ $rute->id_rute }}</td>
                        <td>{{ $rute->rute_awal }}</td>
                        <td>{{ $rute->rute_tujuan }}</td>
                        <td>
                            <a href="{{ route('rute.show', $rute) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('rute.edit', $rute) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('rute.destroy', $rute) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus rute ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
