@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Kategori Gambar
            <a href="{{ route('kategori-gambar.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Tambah Data
            </a>
        </h5>
        <br>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($kategoriGambar as $gambar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $gambar->nama_kategori }}</strong></td>
                        <td>
                            <img src="{{ asset('storage/' . $gambar->url) }}" alt="{{ $gambar->nama_kategori }}" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <!-- Tombol Show -->
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $gambar->id }}">
                                <i class="bx bx-show"></i>
                            </button>

                            <!-- Tombol Edit -->
                            <a href="{{ route('kategori-gambar.edit', $gambar->id) }}" class="btn btn-sm btn-warning">
                                <i class="bx bx-pencil"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('kategori-gambar.destroy', $gambar->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal untuk Show -->
                    <div class="modal fade" id="showModal{{ $gambar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <strong>Nama Kategori:</strong> {{ $gambar->nama_kategori }}
                                    <br>
                                    <strong>Gambar:</strong> <img src="{{ asset('storage/' . $gambar->url) }}" alt="{{ $gambar->nama_kategori }}" style="width: 100px; height: auto;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
