@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Daftar Pengemudi</h5>
            <a href="{{ route('pengemudi.create') }}" class="btn btn-primary">Tambah Pengemudi</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No SIM</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengemudi as $data)
                    <tr>
                        <td>{{ $data->id_pengemudi }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->no_sim }}</td>
                        <td>
                            <a href="{{ route('pengemudi.show', $data->id_pengemudi) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('pengemudi.edit', $data->id_pengemudi) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pengemudi.destroy', $data->id_pengemudi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
