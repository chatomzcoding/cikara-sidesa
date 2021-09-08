@extends('layouts.admin')

@section('title')
    Detail Dusun
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Wilayah Administratif RW</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dusun')}}">Daftar Dusun</a></li>
            <li class="breadcrumb-item active">Daftar RW</li>
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
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah RW</a>
                <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Hapus Data Terpilih</a>
                <a href="{{ url('/kelompok')}}" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-print"></i> Kembali ke daftar kelompok</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <h4>{{ $dusun->nama_dusun}}</h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Aksi</th>
                                <th>RW</th>
                                <th>Ketua RW</th>
                                <th>NIK Ketua RW</th>
                                <th>RT</th>
                                <th>KK</th>
                                <th>L+P</th>
                                <th>L</th>
                                <th>P</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($rw as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/rw',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        <a href="{{ url('/rw/'.Crypt::encryptString($item->id))}}" class="btn btn-primary btn-sm"><i class="fas fa-list"></i></a>
                                        <button type="button" data-toggle="modal" data-nama_rw="{{ $item->nama_rw }}" data-nik="{{ $item->nik }}" data-dusun_id="{{ $item->dusun_id }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td>{{ $item->nama_rw}}</td>
                                    <td>{{ $item->nik}}</td>
                                    <td>{{ $item->nik}}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="10">tidak ada data</td>
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
            <form action="{{ url('/rw')}}" method="post">
                @csrf
                <input type="hidden" name="dusun_id" value="{{ $dusun->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Wilayah Administratif RW</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama RW</label>
                        <input type="text" name="nama_rw" id="nama_rw" class="form-control col-md-8" placeholder="Nama RW" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">NIK / Nama Ketua RW</label>
                        <select name="nik" id="nik" class="form-control col-md-8">
                            <option value="">-- Pilih Ketua RW --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->nik}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
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
            <form action="{{ route('rw.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Wilayah Administratif RW</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="dusun_id" id="dusun_id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama RW</label>
                        <input type="text" name="nama_rw" id="nama_rw" class="form-control col-md-8" placeholder="Nama RW" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">NIK / Nama Ketua RW</label>
                        <select name="nik" id="nik" class="form-control col-md-8">
                            <option value="">-- Pilih Ketua RW --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->nik}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
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
                var nama_rw = button.data('nama_rw')
                var dusun_id = button.data('dusun_id')
                var nik = button.data('nik')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #dusun_id').val(dusun_id);
                modal.find('.modal-body #nama_rw').val(nama_rw);
                modal.find('.modal-body #nik').val(nik);
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

