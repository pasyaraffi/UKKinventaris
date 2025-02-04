@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Sub-Kategori Asset</h4>
    <form action="{{ route('sub_kategori_asset.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Sub-Kategori Asset</label>
            <input type="text" name="kode_sub_kategori_asset" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Sub-Kategori Asset</label>
            <input type="text" name="sub_kategori_asset" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori Asset</label>
            <select name="id_kategori_asset" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoriAssets as $kategoriAsset)
                    <option value="{{ $kategoriAsset->id_kategori_asset }}">{{ $kategoriAsset->kategori_asset }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('sub_kategori_asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
