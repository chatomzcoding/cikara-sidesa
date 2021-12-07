@extends('layouts.admin')

@section('title')
    Data Info Covid Penduduk
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Info Covid Penduduk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Info Covid Penduduk</li>
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
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-lungs-virus"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Terkonfirmasi</span>
                      <span class="info-box-number">
                        {{ $total['terkonfirmasi'] }}
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
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-heart"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Sembuh</span>
                      <span class="info-box-number">{{ $total['sembuh'] }}</span>
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
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart-broken"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Meninggal</span>
                      <span class="info-box-number">{{ $total['meninggal'] }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Dalam Pemantauan</span>
                      <span class="info-box-number">{{ $total['pemantauan'] }}</span>
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
                <a href="#" class="btn btn-outline-primary btn-sm pop-info" data-toggle="modal" title="Tambah Data Covid Penduduk" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-sm float-right pop-info" title="Cetak Daftar Data Covid"><i class="fas fa-print"></i> CETAK</a>
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
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Histori</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($covid as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                      <form id="data-{{ $item->id }}" action="{{url('/covid',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                      </form>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        {{-- <span class="sr-only">Toggle Dropdown</span> --}}
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-primary" href="{{ url('penduduk/'.Crypt::encryptString($item->penduduk_id)) }}"><i class="fas fa-user"></i> Detail Penduduk</a>
                                        <button type="button" data-toggle="modal" data-status="{{ $item->status }}" data-tanggal="{{ $item->tanggal }}" data-penduduk_id="{{ $item->penduduk_id }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                          <i class="fa fa-edit"></i> Ubah Status
                                        </button>
                                        <div class="dropdown-divider"></div>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                        </div>
                                    </div>
                                    </td>
                                    <td>{{ $item->nama_penduduk }}</td>
                                    <td>{{ date_indo($item->tanggal) }}</td>
                                    <td>
                                      @switch($item->status)
                                          @case('terkonfirmasi')
                                              <span class="badge badge-info btn-block">Terkonfirmasi</span>
                                              @break
                                          @case('sembuh')
                                              <span class="badge badge-success btn-block">Sembuh</span>
                                              @break
                                          @case('meninggal')
                                              <span class="badge badge-danger btn-block">Meninggal</span>
                                              @break
                                          @case('pemantauan')
                                              <span class="badge badge-secondary btn-block">Pemantauan</span>
                                              @break
                                          @default
                                              
                                      @endswitch
                                    </td>
                                    <td>
                                      <button class="btn btn-primary btn-sm btn-block" type="button" data-toggle="collapse" data-target="#collapseExample{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample">
                                        selengkapnya <i class="fas fa-angle-bottom"></i>
                                      </button>
                                      <div class="collapse" id="collapseExample{{ $item->id }}">
                                        <div class="card card-body">
                                          {!! historicovid($item->keterangan) !!}
                                        </div>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
       {{-- modal --}}
       <div class="modal fade" id="cetakdokumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
                @csrf
                <input type="hidden" name="s" value="infocovid">
            <div class="modal-header">
            <h4 class="modal-title">Informasi Cetak Dokumen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Mengetahui</label>
                        <select name="staf" id="staf" class="form-control col-md-8" required>
                            <option value="">-- Pilih Staf --</option>
                            @foreach (DbCikara::showtable('staf',['status_pegawai','aktif']) as $item)
                            <option value="{{ $item->id}}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan)}}</option>
                            @endforeach
                        </select>
                            
                   </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> CETAK SEKARANG</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ url('/covid')}}" method="post">
            @csrf
          <div class="modal-header">
          <h4 class="modal-title">Tambah Data Covid Penduduk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <section class="p-3">
                  <div class="form-group">
                      <label for="">Nama Penduduk</label>
                          <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control penduduk" required>
                              <option value="">-- Silahkan Cari NIK / Nama Kepala Keluarga --</option>
                              @foreach ($penduduk as $item)
                                  <option value="{{ $item->id}}">{{ $item->nik.' | '. ucwords($item->nama_penduduk)}}</option>
                              @endforeach
                          </select>
                  </div>
                  <div class="form-group">
                      <label for="">Status Covid</label>
                      <select name="status" id="status" class="form-control">
                          @foreach (list_statuscovid() as $item)
                              <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Tanggal Status Covid</label>
                      <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                  </div>
              </section>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
          </div>
      </form>
      </div>
      </div>
  </div>
  <!-- /.modal -->

  {{-- modal edit --}}
  <div class="modal fade" id="ubah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('covid.update','test')}}" method="post">
              @csrf
              @method('patch')
          <div class="modal-header">
          <h4 class="modal-title">Edit Data Covid Penduduk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <input type="hidden" name="id" id="id">
              <section class="p-3">
                  <div class="form-group">
                    <label for="">Nama Penduduk</label>
                        <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control" disabled>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nik.' | '. ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="">Status Covid</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (list_statuscovid() as $item)
                            <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Status Covid</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
              </section>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
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
              var penduduk_id = button.data('penduduk_id')
              var tanggal = button.data('tanggal')
              var status = button.data('status')
              var id = button.data('id')
      
              var modal = $(this)
      
              modal.find('.modal-body #penduduk_id').val(penduduk_id);
              modal.find('.modal-body #tanggal').val(tanggal);
              modal.find('.modal-body #status').val(status);
              modal.find('.modal-body #id').val(id);
          })
      </script>
      <script>
          $(function () {
          $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy","excel"]
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

