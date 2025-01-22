@extends('layouts.template')
@section('judulh1','Admin - Cek Data')

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
            <h3 class="card-title">Tambah Cek Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('cek_data.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="pendaftar_id">Nama Pendaftar:</label>
                    <select name="pendaftar_id" id="pendaftar_id" class="form-control" required>
                        @foreach($pendaftar as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
</select>
</div>
                <div class="form-group">
                    <label for="status_seleksi">Status Seleksi:</label>
                    <select name="status_seleksi" id="status_seleksi" class="form-control" required>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="pending">Pending</option>
</select>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" name="catatan" id="catatan"></textarea>
                </div>
                
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
