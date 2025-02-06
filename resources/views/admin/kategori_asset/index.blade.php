@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center text-primary">Daftar Kategori Asset</h1>
        
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

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('kategori_asset.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kategori</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori Asset</th>
                        <th>Kategori Asset</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->kode_kategori_asset }}</td>
                            <td>{{ $kategori->kategori_asset }}</td>
                            <td class="text-center">
                                <a href="{{ route('kategori_asset.edit', $kategori->id_kategori_asset) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('kategori_asset.destroy', $kategori->id_kategori_asset) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori asset ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
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
@endsection
