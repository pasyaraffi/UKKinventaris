<!-- resources/views/distributor/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Distributor</h1>
    <form action="{{ route('distributor.update', $distributor->id_distributor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_distributor" class="form-label">Nama Distributor</label>
            <input type="text" name="nama_distributor" id="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $distributor->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $distributor->no_telp }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $distributor->email }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ $distributor->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('distributor.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
