@extends('layouts.admin')

@section('title')
    Data {{ $judul }}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data {{ $judul }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar {{ $judul }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    
  
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            @if ($lapak)
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cube"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Total Produk</span>
                        <span class="info-box-number">
                            {{ count($produk) }}
                            {{-- <small>%</small> --}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="clearfix hidden-md-up"></div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-eye"></i></span>
        
                        <div class="info-box-content">
                        <span class="info-box-text">Total Dilihat</span>
                        <span class="info-box-number">
                            {{ $totaldilihat }}
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
        
                    <!-- fix for small devices only -->
                </div>
            @endif
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                @if ($lapak)
                    <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Produk </a>
                @endif
                {{-- <a href="#" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> Cetak</a> --}}
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 @if ($lapak)
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th>Gambar Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Dilihat</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @foreach ($produk as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/produk',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <button type="button" data-toggle="modal"  data-nama="{{ $item->nama }}" data-keterangan="{{ $item->keterangan }}" data-harga="{{ $item->harga }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td><img src="{{ asset('img/penduduk/produk/'.$item->gambar) }}" alt="" width="100px"></td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ rupiah($item->harga) }}</td>
                                        <td class="text-center">{{ $item->dilihat }}</td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                 @else
                     <section class="alert alert-info text-center">
                        <strong>Sebelum upload produk, terlebih dahulu untuk membuat Lapak sebagai Basis Toko Anda</strong> <br>
                        <a href="" data-toggle="modal" data-target="#tambahlapak" class="btn btn-primary btn-sm">Tambahkan Lapak</a>
                     </section>
                 @endif
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="tambahlapak">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form action="{{ url('lapak')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status_lapak" value="menunggu">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="modal-header">
            <h4 class="modal-title">Buat Lapak</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Lapak <strong class="text-danger">*</strong></label>
                        <input type="text" name="nama_lapak" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">No. Handphone <strong class="text-danger">*</strong></label>
                        <input type="text" name="telp" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Alamat Lapak <strong class="text-danger">*</strong></label>
                        <input type="text" name="alamat" id="alamat" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Tentang Lapak <strong class="text-danger">*</strong></label>
                        <textarea name="tentang" id="tentang" cols="30" rows="4" class="form-control col-md-8" required></textarea>
                        </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Logo</label>
                        <input type="file" name="logo" class="form-control col-md-8" required>
                        </div>
                    </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN PRODUK</button>
            </div>
            </form>
        </div>
        </div>
        </div>
        
    {{-- modal edit --}}
    @if ($lapak)
        <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form action="{{ url('produk')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="status" value="menunggu"> --}}
            <div class="modal-header">
            <h4 class="modal-title">Tambahkan Produk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="lapak_id" value="{{ $lapak->id }}">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Produk <strong class="text-danger">*</strong></label>
                        <input type="text" name="nama" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Harga Produk <strong class="text-danger">*</strong></label>
                        <input type="text" name="harga" id="rupiah" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Uraian Produk <strong class="text-danger">*</strong> <br> <i>* maksimal 255 karakter</i></label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control col-md-8" maxlength="255" required></textarea>
                        </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Poto Produk</label>
                        <input type="file" name="gambar" class="form-control col-md-8" required>
                        </div>
                    </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN PRODUK</button>
            </div>
            </form>
        </div>
        </div>
        </div>
        
    @endif

      {{-- modal edit --}}
      <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('produk.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Produk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Produk</label>
                        <input type="text" name="nama" id="nama" class="form-control col-md-8" required>
                     </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Harga Produk</label>
                        <input type="text" name="harga" id="rupiah2" class="form-control col-md-8" required>
                     </div>
                     <div class="form-group row">
                         <label for="" class="col-md-4">Uraian Produk</label>
                         <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control col-md-8" required></textarea>
                       </div>
                   <div class="form-group row">
                       <label for="" class="col-md-4">Poto Produk</label>
                       <input type="file" name="gambar" class="form-control col-md-8">
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
                var nama = button.data('nama')
                var harga = button.data('harga')
                var keterangan = button.data('keterangan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #rupiah2').val(harga);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #id').val(id);
            })
          </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
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

