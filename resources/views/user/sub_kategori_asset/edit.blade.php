@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Sub Kategori Asset</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sub_kategori_asset.update', $subKategoriAsset->id_sub_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_kategori_asset" class="form-label">Kategori Asset</label>
            <select class="form-control" id="id_kategori_asset" name="id_kategori_asset" required>
                <option value="">Pilih Kategori Asset</option>
                @foreach ($kategoriAssets as $kategori)
                    <option value="{{ $kategori->id_kategori_asset }}" {{ $subKategoriAsset->id_kategori_asset == $kategori->id_kategori_asset ? 'selected' : '' }}>
                        {{ $kategori->kategori_asset }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kode_sub_kategori_asset" class="form-label">Kode Sub Kategori Asset</label>
            <input type="text" class="form-control" id="kode_sub_kategori_asset" name="kode_sub_kategori_asset" value="{{ old('kode_sub_kategori_asset', $subKategoriAsset->kode_sub_kategori_asset) }}" required>
        </div>

        <div class="mb-3">
            <label for="sub_kategori_asset" class="form-label">Sub Kategori Asset</label>
            <input type="text" class="form-control" id="sub_kategori_asset" name="sub_kategori_asset" value="{{ old('sub_kategori_asset', $subKategoriAsset->sub_kategori_asset) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('sub_kategori_asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
