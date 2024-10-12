@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori Gambar</h2>
    <form action="{{ route('kategori-gambar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url">Upload Gambar</label>
            <input type="file" name="url" class="form-control" required accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
