@extends('layouts.admin')

@section('title')
    Data Vaksinsasi
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Vaksinsasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Pengelolaan Vaksinsasi</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
   
@section('container')
    
    <div class="container-fluid">
        <div class="row">
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-6">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cubes"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Kategori</span>
                  <span class="info-box-number">
                      {{ $total['kategori'] }}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-6">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-nurse"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Vaksinasi</span>
                  <span class="info-box-number">
                      {{ $total['vaksinasi'] }}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kategori Kelompok</h3>
              </div>
              <div class="card-body">
                  <section class="mb-3">
                      <ul>
                          @foreach ($kategori as $item)
                              <li class="text-uppercase">{{ $item->nama_kategori}}</li>
                          @endforeach
                      </ul>
                  </section>
                  <a href="{{ url('/vaksinasi?page=kategori')}}" class="btn btn-primary btn-sm btn-block">Kelola Kategori Vaksin </a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                @if (count($kategori) > 0)
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Baru Vaksinasi" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="{{ url('cetakdata?s=vaksinasi&kategori='.$filter['kategori']) }}" target="_blank" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar Vaksinasi"><i class="fas fa-print"></i> CETAK</a>
                @else
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm disabled"><i class="fas fa-info"></i> Tambah Data Jenis Vaksin Terlebih dahulu </a>
                @endif
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                      <form action="{{ url('vaksinasi') }}" method="get">
                        <input type="hidden" name="page" value="filter">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="kategori" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua">Semua</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id}}" @if ($filter['kategori'] == $item->id)
                                            selected
                                        @endif>{{ strtoupper($item->nama_kategori)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                  </section>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Aksi</th>
                                <th>Nama Penduduk</th>
                                <th>Jenis Vaksin</th>
                                <th>Tanggal Vaksin</th>
                                <th>Dosis</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($vaksinasi as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/vaksinasi',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  <a class="dropdown-item text-primary" href="{{ url('/penduduk/'.Crypt::encryptString($item->penduduk_id))}}"><i class="fas fa-list"></i> Detail Penduduk</a>
                                                    <button type="button" data-toggle="modal" data-kategori_id="{{ $item->kategori_id }}" data-tanggal_vaksin="{{ $item->tanggal_vaksin }}" data-penduduk_id="{{ $item->penduduk_id }}" data-keterangan="{{ $item->keterangan }}" data-dosis="{{ $item->dosis }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Data
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nama_penduduk}}</td>
                                    <td class="text-uppercase">{{ $item->nama_kategori}}</td>
                                    <td>{{ date_indo($item->tanggal_vaksin)}}</td>
                                    <td class="text-center">{{ $item->dosis}}</td>
                                    <td>{{ $item->keterangan}}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="7">tidak ada data</td>
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
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/vaksinasi')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Vaksinasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">NIK / Nama Penduduk</label>
                        <div class="col-md-8 p-0">
                            <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control penduduk" required>
                                <option value="">-- Pilih Penduduk --</option>
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Jenis Vaksin</label>
                        <select name="kategori_id" id="kategori_id" class="form-control col-md-8" required>
                            <option value="">-- Pilih Jenis Vaksin --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id}}">{{ strtoupper($item->nama_kategori)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Tanggal Vaksinasi</label>
                        <input type="date" name="tanggal_vaksin" id="tanggal_vaksin" min="1" max="10" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Dosis Ke</label>
                        <input type="number" name="dosis" id="dosis" min="1" max="10" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan (opsional)</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control col-md-8"></textarea>
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
            <form action="{{ route('vaksinasi.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Data Vaksinasi Penduduk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="kategori_ida" id="kategori_ida">
                <input type="hidden" name="dosisa" id="dosisa">
                <input type="hidden" name="penduduk_ida" id="penduduk_ida">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">NIK / Nama Penduduk</label>
                        <div class="col-md-8 p-0">
                            <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control" disabled>
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Jenis Vaksin</label>
                        <select name="kategori_id" id="kategori_id" class="form-control col-md-8" required>
                            <option value="">-- Pilih Jenis Vaksin --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id}}">{{ strtoupper($item->nama_kategori)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Tanggal Vaksinasi</label>
                        <input type="date" name="tanggal_vaksin" id="tanggal_vaksin" min="1" max="10" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Dosis Ke</label>
                        <input type="number" name="dosis" id="dosis" min="1" max="10" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan (opsional)</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control col-md-8"></textarea>
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
                var kategori_id = button.data('kategori_id')
                var tanggal_vaksin = button.data('tanggal_vaksin')
                var dosis = button.data('dosis')
                var keterangan = button.data('keterangan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
                modal.find('.modal-body #penduduk_ida').val(penduduk_id);
                modal.find('.modal-body #kategori_id').val(kategori_id);
                modal.find('.modal-body #kategori_ida').val(kategori_id);
                modal.find('.modal-body #tanggal_vaksin').val(tanggal_vaksin);
                modal.find('.modal-body #dosis').val(dosis);
                modal.find('.modal-body #dosisa').val(dosis);
                modal.find('.modal-body #keterangan').val(keterangan);
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

