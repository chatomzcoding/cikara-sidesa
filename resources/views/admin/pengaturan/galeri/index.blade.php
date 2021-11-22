@extends('layouts.admin')

@section('title')
    Data Galeri
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Pengaturan Galeri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Galeri</li>
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
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Galeri Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                {{-- <a href="#" class="btn btn-outline-info btn-flat btn-sm float-right"><i class="fas fa-print"></i> CETAK</a> --}}
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Gambar</th>
                                <th>Nama Galeri</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($galeri as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/galeri',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  <a class="dropdown-item text-primary" href="{{ url('/galeri/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Galeri</a>
                                                    <button type="button" data-toggle="modal" data-nama_galeri="{{ $item->nama_galeri }}" data-keterangan="{{ $item->keterangan }}" data-status="{{ $item->status }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Galeri
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td><img src="{{ asset('/img/pengaturan/galeri/'.$item->gambar_galeri)}}" alt="" width="150px"></td>
                                    <td>{{ $item->nama_galeri}}</td>
                                    <td>{{ $item->keterangan}}</td>
                                    <td class="text-center">{{ $item->status}}</td>
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
            <form action="{{ url('/galeri')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Galeri</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Galeri <span class="text-danger">*</span></label>
                        <input type="text" name="nama_galeri" id="nama_galeri" value="{{ old('nama_galeri') }}" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Gambar <span class="text-danger">*</span></label>
                        <input type="file" name="gambar_galeri" id="gambar_galeri" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control col-md-8">{{ old('keterangan') }}</textarea>
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
            <form action="{{ route('galeri.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Galeri</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Galeri</label>
                        <input type="text" name="nama_galeri" id="nama_galeri" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Gambar (jika mau diubah)</label>
                        <input type="file" name="gambar_galeri" id="gambar_galeri" class="form-control col-md-8">
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Status</label>
                        <select name="status" id="status" class="form-control col-md-8" required>
                            @foreach (list_status() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control col-md-8"></textarea>
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
                var nama_galeri = button.data('nama_galeri')
                var keterangan = button.data('keterangan')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_galeri').val(nama_galeri);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #status').val(status);
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

