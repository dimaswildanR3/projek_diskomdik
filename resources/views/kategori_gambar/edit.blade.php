@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori Gambar</h2>
    <form action="{{ route('kategori-gambar.update', $kategoriGambar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategoriGambar->nama_kategori }}" required>
        </div>
        <div class="form-group">
            <label for="url">Upload Gambar (Kosongkan jika tidak ingin mengganti)</label>
            <input type="file" name="url" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
