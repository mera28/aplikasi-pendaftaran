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
            <!-- Tambahkan tombol Print -->
            <button onclick="printDetail()" class="btn btn-secondary float-right">
            <i class=" fas fa-print"></i>
                Print
            </button>
        </div>
        <!-- /.card-header -->

        <div class="card-body" id="print-area"> <!-- Tambahkan ID untuk area cetak -->
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
                    <th>Prestasi</th>
                    <td>:</td>
                    <td>{{ $pendaftar->prestasi }}</td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>:
                        @if ($pendaftar->foto)
                        <img src="{{ asset('storage/' . $pendaftar->foto) }}" alt="Foto" width="150">
                        @else
                        Tidak ada foto
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Dokumen</th>
                    <td>:
                        @if ($pendaftar->dokumen)
                        <a href="{{ asset('storage/' . $pendaftar->dokumen) }}" target="_blank">Lihat Dokumen</a>
                        @else
                        Tidak ada dokumen
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Tambahkan JavaScript untuk print -->
<script>
    function printDetail() {
        var printArea = document.getElementById('print-area').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = printArea;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
@endsection
