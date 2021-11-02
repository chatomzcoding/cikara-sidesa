@extends('layouts.admin')

@section('title')
    Detail Kelompok
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Kelompok {{ $kelompok->nama_kelompok}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/kelompok')}}">Daftar Kelompok</a></li>
            <li class="breadcrumb-item active">{{ $kelompok->nama_kelompok}}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    
@endsection

@section('container')
    

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                  {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                  <a href="{{ url('/kelompok')}}" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-angle-left"></i> Kembali ke daftar kelompok</a>
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Anggota Kelompok </a>
                {{-- <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Kartu Keluarga</a> --}}
              </div>
              <div class="card-body">
                @include('sistem.notifikasi')
                  <h2>Rincian Kelompok</h2>
                  <section class="mb-3">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Kelompok</th>
                            <td class="text-capitalize">: {{ $kelompok->nama_kelompok}}</td>
                        </tr>
                        <tr>
                            <th>Ketua Kelompok</th>
                            <td class="text-capitalize">: {{ $kelompok->nama_penduduk}}</td>
                        </tr>
                        <tr>
                            <th>Kategori Kelompok</th>
                            <td class="text-uppercase">: {{ $kelompok->nama_kategori}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $kelompok->deskripsi_kelompok}}</td>
                        </tr>

                    </table>
                  </section>
                  <section>
                      <h2>Daftar Anggota Kelompok</h2>
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>AKSI</th>
                                    <th>Nomor Anggota</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>ALAMAT</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($anggotakelompok as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/anggotakelompok',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <button type="button" data-toggle="modal"data-penduduk_id="{{ $item->penduduk_id }}" data-nomor_anggota="{{ $item->nomor_anggota }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i> Edit Anggota
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->nomor_anggota}}</td>
                                        <td>{{ $item->nik}}</td>
                                        <td>{{ $item->nama_penduduk}}</td>
                                        <td>{{ $item->alamat_sekarang}}</td>
                                    </tr>
                                    
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">tidak ada data</td>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                  </section>
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
            <form action="{{ url('/anggotakelompok')}}" method="post">
                @csrf
                <input type="hidden" name="kelompok_id" value="{{ $kelompok->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Anggota Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Nama Anggota</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                            <option value="">-- Silahkan Cari NIK / Nama Penduduk --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Anggota</label>
                        <input type="text" name="nomor_anggota" id="nomor_anggota" class="form-control" required>
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
            <form action="{{ route('anggotakelompok.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Anggota Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Nama Anggota</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control" required>
                            <option value="">-- Silahkan Cari NIK / Nama Penduduk --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Anggota</label>
                        <input type="text" name="nomor_anggota" id="nomor_anggota" class="form-control" required>
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

@endsection

    <!-- /.modal -->

    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var penduduk_id = button.data('penduduk_id')
                var nomor_anggota = button.data('nomor_anggota')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
                modal.find('.modal-body #nomor_anggota').val(nomor_anggota);
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