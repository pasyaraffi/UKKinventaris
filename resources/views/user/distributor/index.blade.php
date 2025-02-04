<!-- resources/views/distributor/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Distributor</h1>
    <a href="{{ route('distributor.create') }}" class="mb-3 btn btn-primary">Tambah Distributor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
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
                <td>{{ $distributor->id_distributor }}</td>
                <td>{{ $distributor->nama_distributor }}</td>
                <td>{{ $distributor->alamat }}</td>
                <td>{{ $distributor->no_telp }}</td>
                <td>{{ $distributor->email }}</td>
                <td>{{ $distributor->keterangan }}</td>
                <td>
                    <a href="{{ route('distributor.edit', $distributor->id_distributor) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('distributor.destroy', $distributor->id_distributor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
