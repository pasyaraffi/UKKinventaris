@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Mutasi Lokasi</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Pengadaan</th>
                            <th>Flag Lokasi</th>
                            <th>Flag Pindah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $mutasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mutasi->lokasi->nama_lokasi }}</td>
                                <td>{{ $mutasi->pengadaan->kode_pengadaan }}</td>
                                <td>{{ $mutasi->flag_lokasi }}</td>
                                <td>{{ $mutasi->flag_pindah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 