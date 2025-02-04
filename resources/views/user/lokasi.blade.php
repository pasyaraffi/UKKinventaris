@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Lokasi</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Lokasi</th>
                            <th>Nama Lokasi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $lokasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lokasi->kode_lokasi }}</td>
                                <td>{{ $lokasi->nama_lokasi }}</td>
                                <td>{{ $lokasi->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 