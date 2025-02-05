@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Data Opname</h1>
    <a href="{{ route('opname.create') }}" class="btn btn-primary mb-3">Tambah Opname</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $opname->pengadaan->id_pengadaan ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $opname->tgl_opname }}</td>
                    <td>{{ $opname->kondisi }}</td>
                    <td>{{ $opname->keterangan }}</td>
                    <td>
                        <a href="{{ route('opname.edit', $opname->id_opname) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('opname.destroy', $opname->id_opname) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
@endsection
