@extends('layouts.admin')

@section('title')
    Data Kelompok
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Kelompok</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Pengelolaan Kelompok</li>
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
                <h3 class="card-title">Kategori Kelompok</h3>
              </div>
              <div class="card-body">
                  <section class="mb-3">
                      <ul>
                          @foreach ($kategorikelompok as $item)
                              <li>{{ $item->nama_kategori}}</li>
                          @endforeach
                      </ul>
                  </section>
                  <a href="{{ url('/kategorikelompok')}}" class="btn btn-primary btn-sm btn-block">Kelola Kategori Kelompok</a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Kelompok Baru </a>
                <a href="{{ url('cetak/list/kelompok') }}" target="_blank" class="btn btn-outline-info btn-flat btn-sm float-right"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                      <form action="{{ url('kelompok') }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="kategori" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua">Semua</option>
                                    @foreach ($kategorikelompok as $item)
                                        <option value="{{ $item->id}}" @if ($kategori == $item->id)
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
                                <th>Nama Kelompok</th>
                                <th>Ketua Kelompok</th>
                                <th>Kategori Kelompok</th>
                                <th>Jumlah Anggota</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($kelompok as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/kelompok',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  <a class="dropdown-item text-primary" href="{{ url('/kelompok/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Kelompok</a>
                                                    <button type="button" data-toggle="modal" data-nama_kelompok="{{ $item->nama_kelompok }}" data-kode_kelompok="{{ $item->kode_kelompok }}" data-penduduk_id="{{ $item->penduduk_id }}" data-kategorikelompok_id="{{ $item->kategorikelompok_id }}" data-deskripsi_kelompok="{{ $item->deskripsi_kelompok }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Kelompok
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nama_kelompok}}</td>
                                    <td>{{ $item->nama_penduduk}}</td>
                                    <td>{{ $item->nama_kategori}}</td>
                                    <td class="text-center">{{ DbCikara::countData('anggota_kelompok',['kelompok_id',$item->id]) }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">tidak ada data</td>
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
            <form action="{{ url('/kelompok')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Kelompok</label>
                        <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control col-md-8" placeholder="Nama Kelompok" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Kode Kelompok</label>
                        <input type="text" id="kode_kelompok" name="kode_kelompok" class="form-control col-md-8" placeholder="Kode Kelompok" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Kelompok</label>
                        <select name="kategorikelompok_id" id="kategorikelompok_id" class="form-control col-md-8" required>
                            <option value="">-- Silahkan Masukkan Kategori Kelompok --</option>
                            @foreach ($kategorikelompok as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Ketua Kelompok</label>
                        <select name="penduduk_id" id="" class="form-control col-md-8 penduduk" data-width="60%" required>
                            <option value="">-- Silahkan Masukkan NIK / Nama --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nik.' | '.ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Deskripsi Kelompok</label>
                        <textarea name="deskripsi_kelompok" id="deskripsi_kelompok" cols="30" rows="4" class="form-control col-md-8"></textarea>
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
            <form action="{{ route('kelompok.update','test')}}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="logo_unit" value="">
            <div class="modal-header">
            <h4 class="modal-title">Edit Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Kelompok</label>
                        <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control col-md-8" placeholder="Nama Kelompok" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Kode Kelompok</label>
                        <input type="text" id="kode_kelompok" name="kode_kelompok" class="form-control col-md-8" placeholder="Kode Kelompok" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Kelompok</label>
                        <select name="kategorikelompok_id" id="kategorikelompok_id" class="form-control col-md-8" required>
                            <option value="">-- Silahkan Masukkan Kategori Kelompok --</option>
                            @foreach ($kategorikelompok as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Ketua Kelompok</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control col-md-8" required>
                            <option value="">-- Silahkan Masukkan NIK / Nama --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_penduduk}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Deskripsi Kelompok</label>
                        <textarea name="deskripsi_kelompok" id="deskripsi_kelompok" cols="30" rows="4" class="form-control col-md-8"></textarea>
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
                var nama_kelompok = button.data('nama_kelompok')
                var kode_kelompok = button.data('kode_kelompok')
                var penduduk_id = button.data('penduduk_id')
                var kategorikelompok_id = button.data('kategorikelompok_id')
                var deskripsi_kelompok = button.data('deskripsi_kelompok')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_kelompok').val(nama_kelompok);
                modal.find('.modal-body #kode_kelompok').val(kode_kelompok);
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
                modal.find('.modal-body #kategorikelompok_id').val(kategorikelompok_id);
                modal.find('.modal-body #deskripsi_kelompok').val(deskripsi_kelompok);
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

