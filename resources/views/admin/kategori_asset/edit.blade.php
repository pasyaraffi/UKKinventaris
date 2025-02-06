@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center text-warning">Edit Kategori Asset</h1>

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

        <form action="{{ route('kategori_asset.update', $kategoriAsset->id_kategori_asset) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_kategori_asset" class="form-label">Kode Kategori Asset</label>
                <input type="text" class="form-control" id="kode_kategori_asset" name="kode_kategori_asset" value="{{ old('kode_kategori_asset', $kategoriAsset->kode_kategori_asset) }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori_asset" class="form-label">Kategori Asset</label>
                <input type="text" class="form-control" id="kategori_asset" name="kategori_asset" value="{{ old('kategori_asset', $kategoriAsset->kategori_asset) }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Update</button>
                <a href="{{ route('kategori_asset.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
