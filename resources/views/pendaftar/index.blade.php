@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection

@section('judulh1','Admin - Pendaftar')

@section('konten')

<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h2 class="card-title">Data pendaftar</h2>
            <a type="button" class="btn btn-success float-right" href="{{ route('pendaftar.create') }}">
                <i class=" fas fa-plus"></i> Tambah Pendaftar
            </a>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Prestasi</th>
                        <th>Foto</th>
                        <th>Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($data as $pendaftar)
                <div class="col-lg-3">
                
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pendaftar->nama }}</td>
                        <td>{{ $pendaftar->alamat}}</td>
                        <td>{{ $pendaftar->nomor_telepon}}</td>
                        <td>{{ $pendaftar->tanggal_lahir}}</td>
                        <td>{{ $pendaftar->jenis_kelamin }}</td>
                        <td>{{ $pendaftar->tinggi_badan }}</td>
                        <td>{{ $pendaftar->berat_badan }}</td>
                        <td>{{ $pendaftar->prestasi }}</td>
                        <td>
    @if($pendaftar->foto)
    <img src="{{ $pendaftar->foto ? Storage::url($pendaftar->foto) : asset('images/default.jpg') }}" class="card-img-top" alt="Foto Pendaftar">
    @else
    <img src="{{ $pendaftar->foto ? Storage::url($pendaftar->foto) : asset('images/default.jpg') }}" class="card-img-top" alt="Foto Pendaftar">
    @endif
</td>
<td>
    @if($pendaftar->dokumen)
        <a href="{{ asset('storage/'.$pendaftar->dokumen) }}" target="_blank">Lihat Dokumen</a>
    @else
        <span class="text-muted">Tidak ada dokumen</span>
    @endif
</td>

                        <td>
                            <div class="btn-group">
                                <form action="{{ route('pendaftar.destroy',$pendaftar->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class=" fas fa-trash"></i>
                                    </button>

                                </form>

                                <a type="button" class="btn btn-warning" href="{{ route('pendaftar.edit',$pendaftar->id) }}">
                                    <i class=" fas fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-success" href="{{ route('pendaftar.show',$pendaftar->id) }}">
                                    <i class=" fas fa-eye"></i>
                                </a>
                            </div>


                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>


    </div>
</div>
@endsection

@section('tambahanJS')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection

@section('tambahScript')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

@if($message = Session::get('success'))
toastr.success("{{ $message}}");
@elseif($message = Session::get('updated'))
toastr.warning("{{ $message}}");
@elseif($message = Session::get('deleted'))
toastr.error("{{ $message}}");
@endif
</script>
@endsection
