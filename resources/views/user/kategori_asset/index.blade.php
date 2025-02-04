@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Kategori Asset</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Kategori Asset</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori Asset</th>
                <th>Kategori Asset</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->kode_kategori_asset }}</td>
                    <td>{{ $kategori->kategori_asset }}</td>
                    <td>
                        <a href="{{ route('kategori_asset.edit', $kategori->id_kategori_asset) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori_asset.destroy', $kategori->id_kategori_asset) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori asset ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
