@extends('layouts.admin')

@section('title')
    Data {{ $judul }}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data {{ $judul }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar {{ $judul }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope-open-text"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Permintaan Masuk</span>
                      <span class="info-box-number">
                        {{ $total['jumlah'] }}
                        {{-- <small>%</small> --}}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Surat Selesai</span>
                      <span class="info-box-number">
                        {{ $total['selesai'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-signature"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Surat Dalam Proses</span>
                      <span class="info-box-number">
                        {{ $total['proses'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Menunggu Konfirmasi</span>
                      <span class="info-box-number">
                        {{ $total['menunggu'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                {{-- <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Data </a> --}}
                <a href="#" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> Cetak</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Nama Penduduk</th>
                                <th>Tanggal Permintaan</th>
                                <th>Surat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($surat as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                      <form id="data-{{ $item->id }}" action="{{url('/penduduksurat',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                        @if ($item->status == 'selesai')
                                          <a class="dropdown-item text-primary" href="{{ url('cetaksurat/'.$item->id) }}"><i class="fas fa-print"></i> Cetak Surat</a>
                                        @endif
                                        @if ($item->status == 'menunggu')
                                          <button type="button" data-toggle="modal" data-id="{{ $item->id }}" data-status={{ $item->status }} data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                              <i class="fa fa-edit"> Tanggapi Surat</i>
                                          </button>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                        </div>
                                    </div>
                                    </td>
                                    <td>{{ DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->nama_surat }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('selesai')
                                                <span class="badge badge-success w-100">{{ $item->status }}</span></td>
                                                @break
                                            @case('proses')
                                                <span class="badge badge-warning w-100">{{ $item->status }}</span></td>
                                                @break
                                            @case('menunggu')
                                                <span class="badge badge-danger w-100">{{ $item->status }}</span></td>
                                                @break
                                            @default
                                        @endswitch
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

      {{-- modal edit --}}
      <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('suratpenduduk.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Pengajuan Surat</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="status" value="selesai">
                  <div class="form-group row">
                      <label for="" class="col-md-4">Berlaku dari <strong class="text-danger">*</strong></label>
                      <input type="date" name="tgl_awal" value="2021-11-20" class="form-control col-md-8" required>
                  </div>
                  <div class="form-group row">
                      <label for="" class="col-md-4">Berlaku sampai <strong class="text-danger">*</strong></label>
                      <input type="date" name="tgl_akhir" value="2021-11-30" class="form-control col-md-8" required>
                  </div>
                  <div class="form-group row">
                      <label for="" class="col-md-4">Ditandatangani oleh <strong class="text-danger">*</strong></label>
                      <div class="col-md-8 p-0">
                        <select name="staf_id" class="form-control penduduk" data-width="100%" required>
                          @foreach ($staf as $item)
                          <option value="{{ $item->id }}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan) }}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-success"> KONFIRMASI SURAT</button>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
          </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->
    @section('script')
    <script>
      $('#ubah').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var status = button.data('status')
          var id = button.data('id')
  
          var modal = $(this)
  
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #id').val(id);
      })
    </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
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

