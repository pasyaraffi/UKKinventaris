@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">📍 Daftar Mutasi Lokasi</h1>
            <a href="{{ route('mutasi_lokasi.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Mutasi Lokasi</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>ID Lokasi</th>
                        <th>ID Pengadaan</th>
                        <th>Flag Lokasi</th>
                        <th>Flag Pindah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mutasiLokasi as $mutasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mutasi->lokasi->id_lokasi }}</td>
                            <td>{{ $mutasi->pengadaan->kode_pengadaan }}</td>
                            <td>{{ $mutasi->flag_lokasi }}</td>
                            <td>{{ $mutasi->flag_pindah }}</td>
                            <td>
                                <a href="{{ route('mutasi_lokasi.edit', $mutasi->id_mutasi_lokasi) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('mutasi_lokasi.destroy', $mutasi->id_mutasi_lokasi) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
@endsection
