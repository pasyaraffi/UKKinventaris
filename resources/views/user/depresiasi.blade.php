@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Data Depresiasi</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lama Depresiasi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $depresiasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $depresiasi->lama_depresiasi }} tahun</td>
                                <td>{{ $depresiasi->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 