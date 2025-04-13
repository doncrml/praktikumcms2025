@extends('layouts.app')

@section('content')
<h2>Edit Rute</h2>
<form method="POST" action="{{ route('rute.update', $rute['id']) }}">
    @csrf
    @method('PUT')
    <input type="text" name="rute_awal" value="{{ $rute['rute_awal'] }}"><br>
    <input type="text" name="rute_tujuan" value="{{ $rute['rute_tujuan'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
