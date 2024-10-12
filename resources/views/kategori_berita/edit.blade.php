@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Kategori Berita</h5>
                <small class="text-muted float-end">Form untuk mengedit kategori berita</small>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori-berita.update', $kategoriBerita->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama_kategori">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" value="{{ old('nama_kategori', $kategoriBerita->nama_kategori) }}" required />
                            @error('nama_kategori')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('kategori-berita.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
