@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Data Depresiasi</h1>
        <a href="{{ route('depresiasi.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Depresiasi</a>
    </div>

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
        <table class="table table-hover shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Lama Depresiasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $depresiasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><span class="badge bg-info text-dark">{{ $depresiasi->lama_depresiasi }} bulan</span></td>
                    <td>{{ $depresiasi->keterangan }}</td>
                    <td>
                        <a href="{{ route('depresiasi.edit', $depresiasi->id_depresiasi) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('depresiasi.destroy', $depresiasi->id_depresiasi) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection