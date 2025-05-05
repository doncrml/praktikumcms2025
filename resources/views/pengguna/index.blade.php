@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Daftar Pengguna</h5>
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary">+ Tambah Pengguna</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengguna as $p)
                        <tr>
                            <td>{{ $p->id_pengguna }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_telepon }}</td>
                            <td>
                                <a href="{{ route('pengguna.show', $p->id_pengguna) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('pengguna.edit', $p->id_pengguna) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pengguna.destroy', $p->id_pengguna) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
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
