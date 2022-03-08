@extends('layouts.admin')

@section('title')
    Data Calon Pemilih
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Calon Pemilih</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Pengelolaan Calon Pemilih</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
   
@section('container')
    
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kategori Pemilih</h3>
              </div>
              <div class="card-body">
                  <section class="mb-3">
                      <ul>
                          @foreach ($kategori as $item)
                              <li>{{ $item->nama_kategori}}</li>
                          @endforeach
                      </ul>
                  </section>
                  <a href="{{ url('/pemilih?sesi=kategori')}}" class="btn btn-primary btn-sm btn-block">Kelola Kategori Pemilih</a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                @if (!is_null($main['kategori_id']))
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Calon Pemilih" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar Kelompok"><i class="fas fa-print"></i> CETAK</a>
                @endif
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                      <form action="{{ url('pemilih') }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="kategori" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua">Semua</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id}}" @if ($main['kategori_id'] == $item->id)
                                            selected
                                        @endif>{{ $item->nama_kategori}}</option>
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
                                <th>Nama Pemilih</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($pemilih as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/pemilih',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  {{-- <a class="dropdown-item text-primary" href="{{ url('/kelompok/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Kelompok</a> --}}
                                                    <button type="button" data-toggle="modal" data-penduduk_id="{{ $item->penduduk_id }}" data-keterangan="{{ $item->keterangan }}" data-status="{{ $item->status }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Pemilih
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nama_penduduk}}</td>
                                    <td>{{ $item->keterangan}}</td>
                                    <td>{{ $item->status}}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">tidak ada data</td>
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
    <div class="modal fade" id="cetakdokumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
                @csrf
                <input type="hidden" name="s" value="pemilih">
                <input type="hidden" name="kategori_id" value="{{ $main['kategori_id'] }}">
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
                                <option value="{{ $item->id}}">{{ ucwords($item->nama_pegawai)}}</option>
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
    @if (!is_null($main['kategori_id']))
        {{-- modal tambah --}}
        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ url('/pemilih')}}" method="post">
                    @csrf
                    <input type="hidden" name="kategori_id" value="{{ $main['kategori_id'] }}">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Data Calon Pemilih {{ $main['kategori']->nama_kategori }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Calon Pemilih</label>
                            <div class="col-md-8 p-0">
                                <select name="penduduk_id" id="" class="form-control penduduk" data-width="100%" required>
                                    <option value="">-- Silahkan Masukkan NIK / Nama --</option>
                                    @foreach ($penduduk as $item)
                                        <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                                    @endforeach
                                </select>
                            </div>
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
        <div class="modal fade" id="ubah">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('pemilih.update','test')}}" method="post">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Calon Pemilih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Calon Pemilih</label>
                            <div class="col-md-8 p-0">
                                <select name="penduduk_id" id="penduduk_id" class="form-control penduduk" data-width="100%" required>
                                    <option value="">-- Silahkan Masukkan NIK / Nama --</option>
                                    @foreach ($penduduk as $item)
                                        <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan (opsional)</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control col-md-8"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4">status Pemilih</label>
                            <div class="col-md-8 p-0">
                                <select name="status" id="status" class="form-control" data-width="100%" required>
                                    <option value="aktif">AKTIF</option>
                                    <option value="non-aktif">NON AKTIF</option>
                                </select>
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
        
    @endif

    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var penduduk_id = button.data('penduduk_id')
                var keterangan = button.data('keterangan')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
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

