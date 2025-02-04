@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Dashboard User</h1>
    <p class="text-center">Lihat informasi data dan aset melalui menu di bawah ini.</p>

    <div class="mt-4 row">
        <!-- Pengadaan -->
        <div class="mb-4 col-md-6">
            <div class="shadow-sm card">
                <div class="text-center card-body">
                    <h5 class="card-title">Pengadaan</h5>
                    <p class="card-text">Lihat data pengadaan aset.</p>
                    <a href="{{ route('user.pengadaan') }}" class="btn btn-info">Lihat Data</a>
                </div>
            </div>
        </div>

        <!-- Hitung Depresiasi -->
        <div class="mb-4 col-md-6">
            <div class="shadow-sm card">
                <div class="text-center card-body">
                    <h5 class="card-title">Hitung Depresiasi</h5>
                    <p class="card-text">Lihat perhitungan depresiasi aset.</p>
                    <a href="{{ route('user.hitung_depresiasi') }}" class="btn btn-info">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
