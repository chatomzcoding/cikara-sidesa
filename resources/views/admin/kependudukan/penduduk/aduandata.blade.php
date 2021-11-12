@extends('layouts.admin')

@section('title')
    Data Penduduk
    @endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Pengaduan Kelengkapan Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('penduduk')}}">Daftar Penduduk</a></li>
            <li class="breadcrumb-item active">Data Pengaduan</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <a href="{{ url('/penduduk')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Penduduk"><i class="fas fa-angle-left"></i> Kembali</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Tiket</th>
                                <th>Nama Penduduk</th>
                                <th>Data</th>
                                <th>Data Awal</th>
                                <th>Pengaduan</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($penduduk as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->idaduan }}" action="{{url('/pendudukaduan',$item->idaduan)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-flat">Aksi</button>
                                            <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item text-success" href="{{ url('/penduduk/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Perbaiki Data</a>
                                            <a class="dropdown-item text-primary" href="{{ url('penduduk/'.Crypt::encryptString($item->id)) }}"><i class="fas fa-user"></i> Detail Penduduk</a>
                                            <div class="dropdown-divider"></div>
                                            <button onclick="deleteRow( {{ $item->idaduan }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->id.$item->user_id.tgl_sekarang() }}
                                    </td>
                                    <td>
                                        {{ $item->nama_penduduk}}
                                    </td>
                                    <td>{{ $item->key }}</td>
                                    <td>
                                        @php
                                            $key = $item->key; 
                                        @endphp
                                        {{ $item->$key }}
                                    </td>
                                    <td class="text-danger">
                                       {{ $item->isi }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">belum ada data</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}

    <div class="modal fade" id="importpenyesuaian">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/pendudukpenyesuaian')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Penyesuaian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Penyesuaian adalah cara import data penduduk dari file excel dengan tujuan penyesuaian data penduduk, data akan diperbaharui berdasarkan NIK penduduk, apabila NIK belum ada maka akan menambahkan data baru. <strong>gunakan metode ini jika ingin memperbaharui data penduduk secara serentak, perhatikan nomor NIK agar sesuai dengan data penduduk !</strong></p>
                        <strong>Download Format Import Penduduk Penyesuaian</strong> <a href="{{ asset('file/format_penduduk_simple.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> IMPORT</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="importsimple">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/penduduksimple')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Metode Mudah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Mudah adalah cara import data penduduk dari file excel dengan kolom isian hanya biodata penting penduduk seperti yang tertuang dalam KTP, data sisanya dapat diedit sesuai dengan kebutuhan penduduk. <strong>gunakan metode ini jika data penduduk kurang lengkap !</strong></p>
                        <strong>Download Format Import Penduduk Mudah</strong> <a href="{{ asset('file/format_penduduk_simple.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> IMPORT</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="import">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/penduduk')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Metode Lengkap</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Lengkap adalah cara import data penduduk dari file excel dengan kolom isian yang lengkap dimulai dari biodata penduduk, anggota keluarga, kewarganegaraan, perkawinan, kesehatan dan data lainnya. <strong>gunakan metode ini jika data penduduk lengkap !</strong></p>
                        <strong>Download Format Import Penduduk Lengkap </strong> <a href="{{ asset('file/format_import_penduduk.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <div class="col-md-8 p-0">
                            <input type="file" name="file" class="form-control col-md-8" required>
                            <span class="text-danger">file berformat excel .xlsx</span>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> IMPORT</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    


    @section('script')
        
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            });
        </script>
    @endsection
@endsection
