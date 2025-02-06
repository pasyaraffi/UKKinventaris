@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Daftar Satuan</h1>
        <a href="{{ route('satuan.create') }}" class="btn btn-success">Tambah Satuan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Satuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $satuan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $satuan->satuan }}</td>
                        <td class="text-center">
                            <a href="{{ route('satuan.edit', $satuan->id_satuan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('satuan.destroy', $satuan->id_satuan) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus satuan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
