@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Sub Kategori Asset</h4>
            <a href="{{ route('sub_kategori_asset.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Sub Kategori Asset</th>
                            <th>Nama Sub Kategori Asset</th>
                            <th>Kategori Asset</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $subKategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subKategori->kode_sub_kategori_asset }}</td>
                                <td>{{ $subKategori->sub_kategori_asset }}</td>
                                <td>{{ $subKategori->kategoriAsset->kategori_asset }}</td>
                                <td>
                                    <a href="{{ route('sub_kategori_asset.edit', $subKategori->id_sub_kategori_asset) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('sub_kategori_asset.destroy', $subKategori->id_sub_kategori_asset) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
