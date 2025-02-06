@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">Daftar Lokasi</h1>
            <a href="{{ route('lokasi.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus"></i> Tambah Lokasi
            </a>
        </div>

        @if (session('success'))
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

        <div class="card shadow-lg border-0">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Kode Lokasi</th>
                            <th>Nama Lokasi</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokasi as $lokasiItem)
                            <tr>
                                <td>{{ $lokasiItem->id_lokasi }}</td>
                                <td>{{ $lokasiItem->kode_lokasi }}</td>
                                <td>{{ $lokasiItem->nama_lokasi }}</td>
                                <td>{{ $lokasiItem->keterangan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('lokasi.edit', $lokasiItem->id_lokasi) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('lokasi.destroy', $lokasiItem->id_lokasi) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');">
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
@endsection