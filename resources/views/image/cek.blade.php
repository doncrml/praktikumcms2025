@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="py-3">Detail Gambar</h4>
    <div class="card p-3">
        <ul class="list-unstyled">
            <li><strong>ID:</strong> {{ $image->id }}</li>
            <li><strong>Judul:</strong> {{ $image->title }}</li>
            <li><strong>Gambar:</strong><br>
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" class="img-fluid mt-2">
            </li>
        </ul>
    </div>
</div>
@endsection
