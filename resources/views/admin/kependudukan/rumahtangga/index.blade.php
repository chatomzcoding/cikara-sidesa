@extends('layouts.admin')

@section('title')
    Data Rumah Tangga
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Rumah Tangga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Rumah Tangga</li>
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
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" data-toggle="modal" data-target="#tambah" title="Tambah Data Rumah Tangga"><i class="fas fa-plus"></i> Tambah</a>
                <a href="{{ url('/rumahtangga')}}" class="btn btn-outline-dark btn-flat btn-sm pop-info" title="kembali ke daftar awal"><i class="fas fa-sync"></i> Bersihkan Filter</a>

                <a href="{{ url('cetak/list/rumahtangga') }}" target="_blank" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar Rumah Tangga"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                      <form action="{{ url('rumahtangga') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="dusun" id="" class="form-control form-control-sm" onchange="this.form.submit()">
                                    <option value="semua">-- Semua Dusun --</option>
                                    @foreach ($data['dusun'] as $item)
                                        <option value="{{ $item->id }}" @if ($filter['dusun'] == $item->id)
                                            selected
                                        @endif>{{ strtoupper($item->nama_dusun) }}</option>
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
                                <th>Nomor</th>
                                <th>Kepala Rumah Tangga</th>
                                <th>NIK</th>
                                <th>Jumlah Anggota</th>
                                <th>Alamat</th>
                                <th>Dusun</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Tanggal Terdaftar</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($rumahtangga as $item)
                            @if (filter_data_get($filter,[$item->dusun_id]))
                                <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/rumahtangga',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item text-primary" href="{{ url('/rumahtangga/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Rumah Tangga</a>
                                                    <button type="button" data-toggle="modal" data-penduduk_id="{{ $item->penduduk_id }}" data-nomor="{{ $item->nomor }}" data-tgl_daftar="{{ $item->tgl_daftar }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Rumah Tangga
                                                    </button>
                                                    <div class="dropdown-divider"></div>
                                                    <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nomor }}</td>
                                    <td>{{ $item->nama_penduduk}}</td>
                                    <td>{{ DbCikara::datapenduduk($item->nik,'nik')->nama_penduduk }}</td>
                                    <td class="text-center">{{ DbCikara::countData('anggota_rumah_tangga',['rumahtangga_id',$item->id])}}</td>
                                    <td>{{ $item->alamat_sekarang}}</td>
                                    <td>{{ $item->nama_dusun }}</td>
                                    <td>{{ $item->nama_rw }}</td>
                                    <td>{{ $item->nama_rt }}</td>
                                    <td>{{ date_indo($item->tgl_daftar) }}</td>
                                </tr>
                            @endif
                            @empty
                                <tr class="text-center">
                                    <td colspan="11">tidak ada data</td>
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
            <form action="{{ url('/rumahtangga')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Rumah Tangga Per Penduduk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Nomor Rumah Tangga</label>
                        <input type="text" name="nomor" id="nomor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Terdaftar</label>
                        <input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kepala Keluarga (dari penduduk yang tidak memiliki No. KK)</label>
                        <select name="penduduk_id" id="" data-width="100%" class="form-control penduduk" required>
                            <option value="">-- Silahkan Cari NIK / Nama Kepala Keluarga --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-secondary mt-2">
                            Silakan cari nama / NIK dari data penduduk yang sudah terinput. Penduduk yang dipilih otomatis berstatus sebagai Kepala Rumah Tangga baru tersebut.
                        </div>
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
            <form action="{{ route('rumahtangga.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Rumah Tangga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Nomor Rumah Tangga</label>
                        <input type="text" name="nomor" id="nomor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Terdaftar</label>
                        <input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kepala Keluarga (dari penduduk yang tidak memiliki No. KK)</label>
                        <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control penduduk" required>
                            <option value="">-- Silahkan Cari NIK / Nama Kepala Keluarga --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-secondary mt-2">
                            Silakan cari nama / NIK dari data penduduk yang sudah terinput. Penduduk yang dipilih otomatis berstatus sebagai Kepala Rumah Tangga baru tersebut.
                        </div>
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
                var nomor = button.data('nomor')
                var tgl_daftar = button.data('tgl_daftar')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
                modal.find('.modal-body #nomor').val(nomor);
                modal.find('.modal-body #tgl_daftar').val(tgl_daftar);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel"]
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

