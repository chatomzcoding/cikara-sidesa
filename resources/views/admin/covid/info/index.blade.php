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
                <a href="#" class="btn btn-outline-info btn-sm float-right pop-info" title="Cetak Daftar Data Covid"><i class="fas fa-print"></i> CETAK</a>
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
                                <th>Alamat</th>
                                <th>Status</th>
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
                                        <div class="dropdown-divider"></div>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                        </div>
                                    </div>
                                    </td>
                                    <td>{{ $item->nama_penduduk }}</td>
                                    <td>{{ $item->alamat_sekarang }}</td>
                                    <td>
                                      @switch($item->status)
                                          @case('terkonfirmasi')
                                              <button class="btn btn-info btn-sm btn-block">Terkonfirmasi</button>
                                              @break
                                          @case('sembuh')
                                              <button class="btn btn-success btn-sm btn-block">Sembuh</button>
                                              @break
                                          @case('meninggal')
                                              <button class="btn btn-danger btn-sm btn-block">Meninggal</button>
                                              @break
                                          @case('pemantauan')
                                              <button class="btn btn-secondary btn-sm btn-block">Pemantauan</button>
                                              @break
                                          @default
                                              
                                      @endswitch
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
          <form action="{{ route('keluarga.update','test')}}" method="post">
              @csrf
              @method('patch')
          <div class="modal-header">
          <h4 class="modal-title">Edit Data Keluarga</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <input type="hidden" name="id" id="id">
              <section class="p-3">
                  <div class="form-group">
                      <label for="">Kepala Keluarga (dari penduduk yang tidak memiliki No. KK)</label>
                      <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control penduduk" required>
                          <option value="">-- Silahkan Cari NIK / Nama Kepala Keluarga --</option>
                          @foreach ($penduduk as $item)
                              <option value="{{ $item->id}}">{{ $item->nik.' | '. ucwords($item->nama_penduduk)}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Nomor Kartu Keluarga (KK)</label>
                      <input type="text" name="no_kk" id="no_kk" class="form-control" pattern="[0-9]{16}" maxlength="16" placeholder="Nomor Kartu Keluarga" required>
                  </div>
                  <div class="form-group">
                      <label for="">Nomor Kartu Keluarga (KK)</label>
                      <select name="status_kk" id="status_kk" class="form-control">
                          @foreach (list_statuskk() as $item)
                              <option value="{{ $item}}">{{ strtoupper($item) }}</option>
                          @endforeach
                      </select>
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
              var no_kk = button.data('no_kk')
              var penduduk_id = button.data('penduduk_id')
              var status_kk = button.data('status_kk')
              var id = button.data('id')
      
              var modal = $(this)
      
              modal.find('.modal-body #no_kk').val(no_kk);
              modal.find('.modal-body #penduduk_id').val(penduduk_id);
              modal.find('.modal-body #status_kk').val(status_kk);
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

