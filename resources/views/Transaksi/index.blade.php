@extends('layouts.app')

@section('content')
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transaksi.create') }}">Tambah Transaksi</a>
    <ul>
        @foreach ($transaksi as $t)
            <li>
                <a href="{{ route('transaksi.show', $t['id']) }}">
                    Transaksi #{{ $t['id'] }} - Total: Rp{{ number_format($t['total_biaya'], 0, ',', '.') }}
                </a>
                <a href="{{ route('transaksi.edit', $t['id']) }}">[Edit]</a>
                <form action="{{ route('transaksi.destroy', $t['id']) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
