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
            <li class="breadcrumb-item active">{{ $judul }}</li>
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
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <table width="100%">
                            <tr>
                                <th>Nama Lapak</th>
                                <td>: Ikan Pancing</td>
                            </tr>
                            <tr>
                                <th>Tanggal Bergabung</th>
                                <td>: 12 Juni 2020</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>: Jual Beli Alat Pancing Ikan</td>
                            </tr>
                            <tr>
                                <th>Status Mitra Desa</th>
                                <td>: <span class="badge badge-success">YA</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tshirt"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Produk</span>
                      <span class="info-box-number">7</span>
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
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Transaksi</span>
                      <span class="info-box-number">40</span>
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
                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Produk </a>
                <a href="#" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> Cetak</a>
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
                                <th>Nama Produk</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach (data_produk() as $item)
                                <tr>
                                    <td class="text-center">{{ $item[0] }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('tampilan/showlapak') }}" class="btn btn-primary btn-sm"><i class="fas fa-external-link-square-alt"></i> </a>
                                        {{-- <button type="button" data-toggle="modal" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button> --}}
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td><img src="{{ asset('img/demo/'.$item[1]) }}" alt="" width="100px"></td>
                                    <td>{{ $item[2] }}</td>
                                    <td>{{ $item[3] }}</td>
                                    <td>{{ rupiah($item[4]) }}</td>
                                    <td><span class="badge badge-success w-100">{{ $item[5] }}</span></td>
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @section('script')
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

