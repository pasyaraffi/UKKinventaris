@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary">📋 Data Opname</h1>
        <a href="{{ route('opname.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Opname</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Pengadaan</th>
                        <th>Tanggal Opname</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($opnames as $opname)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $opname->pengadaan->kode_pengadaan ?? 'Tidak ditemukan' }}</td>
                            <td>{{ $opname->tgl_opname }}</td>
                            <td class="text-center">
                                <span class="badge {{ $opname->kondisi == 'Bagus' ? 'bg-success' : ($opname->kondisi == 'Rusak' ? 'bg-warning' : 'bg-danger') }}">
                                    {{ $opname->kondisi }}
                                </span>
                            </td>
                            <td>{{ $opname->kondisi == 'Bagus' ? '-' : $opname->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('opname.edit', $opname->id_opname) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('opname.destroy', $opname->id_opname) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data tidak tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
