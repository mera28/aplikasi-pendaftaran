@extends('layouts.template')

@section('judulh1', 'Admin - Dashboard')

@section('konten')
<div class="container">
    <div class="row">
        <!-- Total Pendaftar -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
        <h3> {{ $pendaftar_count }} </h3>
                    <p>Total Pendaftar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('pendaftar.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Laki-Laki -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box bg-primary">
                <div class="inner">
                   <h3>{{ $male_count }} </h3>
                    <p>Pendaftar Laki-Laki</p>
                </div>
                <div class="icon">
                    <i class="fas fa-male"></i>
                </div>
                <a href="{{ route('pendaftar.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Perempuan -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $female_count }} </h3>
                    <p>Pendaftar Perempuan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-female"></i>
                </div>
                <a href="{{ route('pendaftar.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Tabel Data Pendaftar -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pendaftar Terbaru</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
