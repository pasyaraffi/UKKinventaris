@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-warning">✏️ Edit Mutasi Lokasi</h1>
        </div>

        <div class="card shadow p-4">
            <form action="{{ route('mutasi_lokasi.update', $mutasiLokasi->id_mutasi_lokasi) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="id_lokasi" class="form-label">Lokasi</label>
                    <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                        @foreach($lokasi as $lokasiItem)
                            <option value="{{ $lokasiItem->id_lokasi }}" {{ $lokasiItem->id_lokasi == $mutasiLokasi->id_lokasi ? 'selected' : '' }}>
                                {{ $lokasiItem->id_lokasi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="id_pengadaan" class="form-label">Pengadaan</label>
                    <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                        @foreach($pengadaan as $pengadaanItem)
                            <option value="{{ $pengadaanItem->id_pengadaan }}" {{ $pengadaanItem->id_pengadaan == $mutasiLokasi->id_pengadaan ? 'selected' : '' }}>
                                {{ $pengadaanItem->kode_pengadaan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
                    <input type="text" class="form-control" id="flag_lokasi" name="flag_lokasi" value="{{ $mutasiLokasi->flag_lokasi }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="flag_pindah" class="form-label">Flag Pindah</label>
                    <input type="text" class="form-control" id="flag_pindah" name="flag_pindah" value="{{ $mutasiLokasi->flag_pindah }}" required>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('mutasi_lokasi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
