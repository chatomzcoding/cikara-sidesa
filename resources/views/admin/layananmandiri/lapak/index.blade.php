@extends('layouts.admin')

@section('title')
    Data {{ $judul }}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data  {{ $judul }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar  {{ $judul }}</li>
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
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-store"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Pelapak</span>
                      <span class="info-box-number">
                        {{ $total['lapak'] }}
                        {{-- <small>%</small> --}}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tshirt"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Produk</span>
                      <span class="info-box-number">
                        {{ $total['produk'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-store"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Menunggu Konfirmasi</span>
                      <span class="info-box-number">
                        {{ $total['menunggu'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-store-alt"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Mitra Desa</span>
                      <span class="info-box-number">
                        {{ $total['mitra'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                {{-- <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Kategori Produk </a> --}}
                <a href="{{ url('cetak/list/lapak') }}" target="_blank" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Logo</th>
                                <th>Nama Lapak</th>
                                <th>Nama Pemilik</th>
                                <th>Keterangan</th>
                                <th>Total Produk</th>
                                <th>Total Transaksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($lapak as $item)
                            @php
                                $nama = DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk;
                            @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                      <form id="data-{{ $item->id }}" action="{{url('/lapak',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                          <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <div class="dropdown-menu" role="menu">
                                            @if ($item->status_lapak == 'konfirmasi')
                                            <button type="button" data-toggle="modal" data-nama="{{ $item->nama_lapak }}" data-alamat="{{ $item->alamat }}" data-pemilik="{{ $nama }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                              <i class="fa fa-edit"></i> Edit Lapak
                                            </button>
                                            @else
                                            <a class="dropdown-item text-primary" href="{{ url('lapak/'.Crypt::encryptString($item->id)) }}"><i class="fas fa-list"></i> Detail Lapak</a>
                                                
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                          </div>
                                      </div>         
                                    </td>
                                    <td><img src="{{ asset('img/penduduk/lapak/'.$item->logo) }}" alt="logo" width="100px"></td>
                                    <td>{{ $item->nama_lapak }}</td>
                                    <td>{{ $nama }}</td>
                                    <td>{{ $item->tentang }}</td>
                                    <td class="text-center">{{ DbCikara::countData('produk',['lapak_id',$item->id]) }}</td>
                                    <td class="text-center">0</td>
                                    <td> @switch($item->status_lapak)
                                      @case('lapak')
                                        <span class="badge badge-success w-100">{{ $item->status_lapak }}</span></td>
                                          @break
                                      @case('menunggu')
                                        <span class="badge badge-danger w-100">{{ $item->status_lapak }}</span></td>
                                          @break
                                      @case('tutup')
                                        <span class="badge badge-warning w-100">{{ $item->status_lapak }}</span></td>
                                          @break
                                      @default
                                          
                                  @endswitch</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

     
    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('lapak.update','test')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
          <div class="modal-header">
          <h4 class="modal-title">Form untuk Menanggapi Lapak</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="status_lapak" value="lapak">
              <input type="hidden" name="sesi" value="admin">
              <section class="p-3">
                <div class="form-group row">
                      <label for="" class="col-md-4">Nama Lapak</label>
                      <input type="text" name="nama" id="nama" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                      <label for="" class="col-md-4">Alamat Lapak</label>
                      <input type="text" name="alamat" id="alamat" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                      <label for="" class="col-md-4">Nama Pemilik</label>
                      <input type="text" name="pemilik" id="pemilik" class="form-control col-md-8" disabled>
                </div>
              </section>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> KONFIRMASI LAPAK</button>
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
          var pemilik = button.data('pemilik')
          var alamat = button.data('alamat')
          var id = button.data('id')
  
          var modal = $(this)
  
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #pemilik').val(pemilik);
          modal.find('.modal-body #statusini').val(status);
          modal.find('.modal-body #alamat').val(alamat);
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

