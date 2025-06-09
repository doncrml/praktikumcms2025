@extends('layouts.app')

@section('content')
<h4 class="fw-bold py-3 mb-4">Halaman Utama</h4>

<div class="card">
  <div class="card-body">
    <p>Selamat datang di sistem database <strong>Ojek Online</strong>!</p>
    
    <p>Pilih peran:</p>

    <a href="{{ route('login.admin') }}" class="btn btn-primary mb-2">Masuk sebagai Admin</a>
    <a href="{{ route('logout') }}" class="btn btn-outline-secondary mb-2">Logout</a>

    @if(session('role'))
      <div class="alert alert-info mt-3">
        Role aktif: <strong>{{ session('role') }}</strong>
      </div>
    @endif
  </div>
</div>
@endsection
