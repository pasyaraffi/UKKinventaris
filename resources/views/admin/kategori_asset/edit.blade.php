@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Kategori Asset</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori_asset.update', $kategoriAsset->id_kategori_asset) }}" method="POST">
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

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('kategori_asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
