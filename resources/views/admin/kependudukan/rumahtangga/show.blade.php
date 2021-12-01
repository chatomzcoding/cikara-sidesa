@extends('layouts.admin')

@section('title')
    Detail Rumah Tangga
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
                <a href="{{ url('/rumahtangga')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar rumah tangga"><i class="fas fa-angle-left"></i> kembali</a>
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Anggota Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah </a>
                <a href="#" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar Detail Rumah Tanggal"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                @include('sistem.notifikasi')
                  <h2>Rincian Rumah Tangga</h2>
                  <section class="mb-3">
                    <table class="table table-striped">
                        <tr>
                            <th width="30%">Nomor Rumah Tangga</th>
                            <td>: {{ $rumahtangga->nomor }}</td>
                        </tr>
                        <tr>
                            <th>Terdaftar</th>
                            <td>: {{ date_indo($rumahtangga->tgl_daftar) }}</td>
                        </tr>
                        <tr>
                            <th>Kepala Rumah Tangga</th>
                            <td class="text-capitalize">: {{ $rumahtangga->nama_penduduk}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $rumahtangga->alamat_sekarang}}</td>
                        </tr>
                        {{-- <tr>
                            <th>Program Bantuan</th>
                            <td>: -</td>
                        </tr> --}}

                    </table>
                  </section>
                  <section>
                      <h2>Daftar Anggota Rumah Tangga</h2>
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>AKSI</th>
                                    <th>NIK</th>
                                    <th>Nomor KK</th>
                                    <th>NAMA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>HUBUNGAN</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($anggotarumahtangga as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/anggotarumahtangga',$item->id)}}" method="post">
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
                                                        <button type="button" data-toggle="modal" data-penduduk_id="{{ $item->penduduk_id }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i> Edit Data
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->nik}}</td>
                                        @php
                                            $kk     = DbCikara::nomorKK($item->penduduk_id);
                                        @endphp
                                        <td>
                                            @if ($kk)
                                                {{ $kk->no_kk }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->nama_penduduk}}</td>
                                        <td>{{ $item->jk}}</td>
                                        <td>{{ $item->alamat_sekarang}}</td>
                                        <td>
                                            @if ($rumahtangga->penduduk_id == $item->penduduk_id)
                                                Kepala Rumah Tangga
                                            @else
                                                Anggota
                                            @endif
                                        </td>
                                    </tr>
                                    
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">tidak ada data</td>
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
            <form action="{{ url('/anggotarumahtangga')}}" method="post">
                @csrf
                <input type="hidden" name="rumahtangga_id" value="{{ $rumahtangga->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Anggota Rumah Tangga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">NIK / Nama Penduduk</label>
                        <select name="penduduk_id" id="" class="form-control penduduk" data-width="100%" required>
                            <option value="">-- Silahkan Cari NIK / Nama Penduduk --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nik .' | '. ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
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
            <form action="{{ route('anggotarumahtangga.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">NIK / Nama Penduduk</label>
                        <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control penduduk" required>
                            <option value="">-- Silahkan Cari NIK / Nama Penduduk --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nik .' | '. ucwords($item->nama_penduduk)}}</option>
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
                var penduduk_id = button.data('penduduk_id')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
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

