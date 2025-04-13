@extends('layouts.app')

@section('content')
<h2>Detail Rute</h2>
<p><strong>Awal:</strong> {{ $rute['rute_awal'] }}</p>
<p><strong>Tujuan:</strong> {{ $rute['rute_tujuan'] }}</p>
<a href="{{ route('rute.edit', $rute['id']) }}">Edit</a>
<form action="{{ route('rute.destroy', $rute['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
@endsection
