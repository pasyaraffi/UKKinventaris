@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary"><i class="fas fa-plus-circle"></i> Tambah Merk</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('merk.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk') }}" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('merk.index') }}" class="btn btn-secondary me-2"><i class="fas fa-times"></i> Batal</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
