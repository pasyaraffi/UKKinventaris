@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success">➕ Tambah Mutasi Lokasi</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-circle"></i> Terjadi Kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow p-4">
            <form action="{{ route('mutasi_lokasi.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="id_lokasi" class="form-label">Lokasi</label>
                    <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                        <option value="" disabled selected>Pilih Lokasi</option>
                        @foreach($lokasi as $lokasiItem)
                            <option value="{{ $lokasiItem->id_lokasi }}">{{ $lokasiItem->id_lokasi }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="id_pengadaan" class="form-label">Pengadaan</label>
                    <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                        <option value="" disabled selected>Pilih Pengadaan</option>
                        @foreach($pengadaan as $pengadaanItem)
                            <option value="{{ $pengadaanItem->id_pengadaan }}">{{ $pengadaanItem->kode_pengadaan }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
                    <input type="text" class="form-control" id="flag_lokasi" name="flag_lokasi" placeholder="Masukkan Flag Lokasi" required>
                </div>
                
                <div class="mb-3">
                    <label for="flag_pindah" class="form-label">Flag Pindah</label>
                    <input type="text" class="form-control" id="flag_pindah" name="flag_pindah" placeholder="Masukkan Flag Pindah" required>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('mutasi_lokasi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
