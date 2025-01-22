@extends('layouts.template')
@section('judulh1','Admin - Pendaftar')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Pendaftar</h3>
        </div>
        <!-- /.card-header -->


        <div class=" card-body">
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>:</td>
                    <td>{{ $pendaftar->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{ $pendaftar->alamat }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>:</td>
                    <td>{{ $pendaftar->nomor_telepon }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>:</td>
                    <td>{{ $pendaftar->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td>{{ $pendaftar->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Tinggi Badan</th>
                    <td>:</td>
                    <td>{{ $pendaftar->tinggi_badan }}</td>
                </tr>
                <tr>
                    <th>Berat Badan</th>
                    <td>:</td>
                    <td>{{ $pendaftar->berat_badan }}</td>
                </tr>
                <tr>
                    <th>prestasi</th>
                    <td>:</td>
                    <td>{{ $pendaftar->prestasi }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
</div>
@endsection
