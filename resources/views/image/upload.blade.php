@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Upload Gambar</h4>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

 
  <div class="card mb-4">
    <div class="card-body">
      <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul Gambar</label>
          <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Pilih Gambar</label>
          <input class="form-control" type="file" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
  </div>


  <div class="row">
    @foreach ($images as $img)
      <div class="col-md-4">
        <div class="card mb-3">
          <img src="{{ asset('storage/' . $img->image_path) }}" class="card-img-top" alt="{{ $img->title }}">
          <div class="card-body">
            <h5 class="card-title">{{ $img->title }}</h5>
            <form action="{{ route('image.delete', $img->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus gambar ini?')">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

</div>
@endsection
