@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Tambah Mutasi Lokasi</h1>

        <form action="{{ route('mutasi_lokasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_lokasi" class="form-label">Lokasi</label>
                <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                    @foreach($lokasi as $lokasiItem)
                        <option value="{{ $lokasiItem->id }}">{{ $lokasiItem->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_pengadaan" class="form-label">Pengadaan</label>
                <select class="form-control" id="id_pengadaan" name="id_pengadaan" required>
                    @foreach($pengadaan as $pengadaanItem)
                        <option value="{{ $pengadaanItem->id }}">{{ $pengadaanItem->kode_pengadaan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
                <input type="text" class="form-control" id="flag_lokasi" name="flag_lokasi" required>
            </div>
            <div class="mb-3">
                <label for="flag_pindah" class="form-label">Flag Pindah</label>
                <input type="text" class="form-control" id="flag_pindah" name="flag_pindah" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
