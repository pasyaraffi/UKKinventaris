@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Merk</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('merk.create') }}" class="btn btn-primary mb-3">Tambah Merk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $merk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $merk->merk }}</td>
                    <td>{{ $merk->keterangan }}</td>
                    <td>
                        <a href="{{ route('merk.edit', $merk->id_merk) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('merk.destroy', $merk->id_merk) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus merk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
