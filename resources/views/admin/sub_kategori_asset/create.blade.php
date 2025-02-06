@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h4 class="text-center text-primary">Tambah Sub-Kategori Asset</h4>
        
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
        
        <form action="{{ route('sub_kategori_asset.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kode Sub-Kategori Asset</label>
                <input type="text" name="kode_sub_kategori_asset" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Sub-Kategori Asset</label>
                <input type="text" name="sub_kategori_asset" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Asset</label>
                <select name="id_kategori_asset" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoriAssets as $kategoriAsset)
                        <option value="{{ $kategoriAsset->id_kategori_asset }}">{{ $kategoriAsset->kategori_asset }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('sub_kategori_asset.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
