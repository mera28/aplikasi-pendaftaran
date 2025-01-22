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

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Pendaftar</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pendaftar.update',$pendaftar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder=""
                        value="{{$pendaftar->nama}}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea name="alamat" class="form-control" id="alamat" required>{{ $pendaftar->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{$pendaftar->nomor_telepon}}">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$pendaftar->tanggal_lahir}}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="Laki-Laki" {{ $pendaftar->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $pendaftar->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan:</label>
                    <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{$pendaftar->tinggi_badan}}">
                </div>
                
                <div class="form-group">
                    <label for="berat_badan">Berat Badan:</label>
                    <input type="number" class="form-control" id="berat_badan" name="berat_badan" value="{{$pendaftar->berat_badan}}" required>
                </div>
                <div class="form-group">
                    <label for="prestasi">Prestasi:</label>
                    <textarea name="prestasi" id="prestasi" class="form-control">{{ $pendaftar->prestasi }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Ubah</button>
            </div>
        </form>
    </div>


</div>


@endsection
