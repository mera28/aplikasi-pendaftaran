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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pendaftar</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pendaftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                </div>
                
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" name="jenis_kelamin" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan (cm):</label>
                    <input type="number" name="tinggi_badan" class="form-control" required min="150">
                </div>
                <div class="form-group">
                    <label for="berat_badan">Berat Badan (kg):</label>
                    <input type="number" name="berat_badan" class="form-control" required min="40">
                </div>
                <div class="form-group">
                    <label for="prestasi">Prestasi</label>
                    <textarea class="form-control" name="prestasi"></textarea>
                </div>
                <!-- Tambahan Input Foto -->
                <div class="form-group">
                    <label for="foto">Unggah Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                </div>
                <!-- Tambahan Input Dokumen -->
                <div class="form-group">
                    <label for="dokumen">Unggah Dokumen (PDF):</label>
                    <input type="file" class="form-control" id="dokumen" name="dokumen" accept=".pdf" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
