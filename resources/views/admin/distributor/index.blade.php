@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Data Distributor</h1>
        <a href="{{ route('distributor.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Distributor</a>
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
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama Distributor</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distributors as $distributor)
                <tr>
                    <td class="text-center">{{ $distributor->id_distributor }}</td>
                    <td>{{ $distributor->nama_distributor }}</td>
                    <td>{{ $distributor->alamat }}</td>
                    <td class="text-center">{{ $distributor->no_telp }}</td>
                    <td>{{ $distributor->email }}</td>
                    <td>{{ $distributor->keterangan }}</td>
                    <td class="text-center">
                        <a href="{{ route('distributor.edit', $distributor->id_distributor) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('distributor.destroy', $distributor->id_distributor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus distributor ini?');">
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
