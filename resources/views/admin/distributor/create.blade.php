@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-success"><i class="fas fa-plus-circle"></i> Tambah Distributor</h1>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('distributor.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="nama_distributor" class="form-label">Nama Distributor</label>
                    <input type="text" name="nama_distributor" id="nama_distributor" class="form-control" placeholder="Masukkan nama distributor" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan no telepon" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ route('distributor.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection