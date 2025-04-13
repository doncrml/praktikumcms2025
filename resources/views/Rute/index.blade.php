@extends('layouts.app')

@section('content')
<h2>Daftar Rute</h2>

<ul>
    @foreach ($rute as $r)
        <li>
            <a href="{{ route('rute.show', $r['id']) }}">
                {{ $r['rute_awal'] }} → {{ $r['rute_tujuan'] }}
            </a>
        </li>
    @endforeach
</ul>

<a href="{{ route('rute.create') }}">+ Tambah Rute</a>
@endsection
