@extends('layouts.admin')

@section('title')
    Detail Data Keluarga
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
                <a href="{{ url('/keluarga')}}" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-angle-left"></i> Kembali ke daftar keluarga</a>
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Anggota </a>
              </div>
              <div class="card-body">
                @include('sistem.notifikasi')
                  <h2>Rincian Keluarga</h2>
                  <section class="mb-3">
                    <table class="table table-striped">
                        <tr>
                            <th width="30%">Nomor Kartu Keluarga (KK)</th>
                            <td>: {{ $keluarga->no_kk}}</td>
                        </tr>
                        <tr>
                            <th>Kepala Keluarga</th>
                            <td class="text-capitalize">: {{ $penduduk->nama_penduduk}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $penduduk->alamat_sekarang}}</td>
                        </tr>
                        {{-- <tr>
                            <th>Program Bantuan</th>
                            <td>: -</td>
                        </tr> --}}

                    </table>
                  </section>
                  <section>
                      <h2>Daftar Anggota Keluarga</h2>
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>AKSI</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>HUBUNGAN</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($anggotakeluarga as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/anggotakeluarga',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                            <a href="{{ url('/keluarga/'.Crypt::encryptString($item->id))}}" class="btn btn-primary btn-sm"><i class="fas fa-list"></i> </a>
                                            <button type="button" data-toggle="modal" data-penduduk_id="{{ $item->penduduk_id }}" data-hubungan="{{ $item->hubungan }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>{{ $item->nik}}</td>
                                        <td>{{ $item->nama_penduduk}}</td>
                                        <td>{{ date_indo($item->tgl_lahir)}}</td>
                                        <td>{{ $item->jk}}</td>
                                        <td>{{ $item->hubungan}}</td>
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
            <form action="{{ url('/anggotakeluarga')}}" method="post">
                @csrf
                <input type="hidden" name="keluarga_id" value="{{ $keluarga->id}}">
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
                            @foreach ($listpenduduk as $item)
                                <option value="{{ $item->id}}">{{ ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Hubungan Keluarga</label>
                        <select name="hubungan" id="" class="form-control" required>
                            <option value="">Pilih Hubungan Keluarga</option>
                            @foreach (list_hubungankeluarga() as $item)
                                <option value="{{ $item}}">{{ strtoupper($item) }}</option>
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
            <form action="{{ route('anggotakeluarga.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Anggota Keluarga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Ubah Anggota</label>
                        <select name="penduduk_id" id="penduduk_id" data-width="100%" class="form-control penduduk">
                            <option value="">-- Silahkan Cari NIK / Nama Penduduk --</option>
                            @foreach ($listpenduduk as $item)
                                <option value="{{ $item->id}}">{{ ucwords($item->nama_penduduk)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Hubungan Keluarga</label>
                        <select name="hubungan" id="hubungan" class="form-control" required>
                            <option value="">Pilih Hubungan Keluarga</option>
                            @foreach (list_hubungankeluarga() as $item)
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
                var penduduk_id = button.data('penduduk_id')
                var hubungan = button.data('hubungan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #penduduk_id').val(penduduk_id);
                modal.find('.modal-body #hubungan').val(hubungan);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

