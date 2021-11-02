@extends('layouts.admin')

@section('title')
    Data Keluarga
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Keluarga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Keluarga</li>
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
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah KK Baru </a>
                <a href="{{ url('cetak/list/keluarga') }}" target="_blank" class="btn btn-outline-info btn-flat btn-sm float-right"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                      <form action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm" disabled>
                                    <option value="">Pilih Status KK</option>
                                    <option value="">KK Aktif</option>
                                    <option value="">KK hilang/pindah/mati</option>
                                    <option value="">KK Kosong</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm" disabled>
                                    <option value="">Jenis Kelamin</option>
                                    <option value="">Laki - laki</option>
                                    <option value="">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm" disabled>
                                    <option value="">Dusun</option>
                                    <option value="">Dusun 1</option>
                                    <option value="">Dusun 2</option>
                                    <option value="">Dusun 3</option>
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
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Dusun</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Jumlah Anggota</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($keluarga as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/keluarga',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  <a class="dropdown-item text-primary" href="{{ url('/keluarga/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Keluarga</a>
                                                    <button type="button" data-toggle="modal" data-no_kk="{{ $item->no_kk }}"  data-penduduk_id="{{ $item->penduduk_id }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Keluarga
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->no_kk}}</td>
                                    <td>{{ $item->nama_penduduk}}</td>
                                    <td>{{ $item->nik}}</td>
                                    <td>{{ $item->alamat_sekarang}}</td>
                                    <td>{{ $item->nama_dusun }}</td>
                                    <td>{{ $item->nama_rw }}</td>
                                    <td>{{ $item->nama_rt }}</td>
                                    <td class="text-center">{{ DbCikara::countData('anggota_keluarga',['keluarga_id',$item->id]) }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="12">tidak ada data</td>
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
            <form action="{{ url('/keluarga')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Kepala Keluarga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
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
                        <input type="text" name="no_kk" class="form-control" pattern="[0-9]{16}" maxlength="16" value="{{ old('no_kk') }}" placeholder="Nomor Kartu Keluarga" required>
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
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #no_kk').val(no_kk);
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

