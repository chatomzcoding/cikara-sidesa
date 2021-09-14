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
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-reader"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Forum</span>
                      <span class="info-box-number">
                        {{ $total['jumlah'] }}
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
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Partisipasi Penduduk</span>
                      <span class="info-box-number">
                        {{ $total['warga'] }}

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
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-eye"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Forum Aktif</span>
                      <span class="info-box-number">
                        {{ $total['aktif'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-eye-slash"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Forum Non-Aktif</span>
                      <span class="info-box-number">
                        {{ $total['non-aktif'] }}

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
                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Forum </a>
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
                                <th>Nama Forum</th>
                                <th>Keterangan</th>
                                <th>Total Partisipan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($forum as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-external-link-square-alt"></i> </a>
                                        {{-- <button type="button" data-toggle="modal" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button> --}}
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->ket_forum }}</td>
                                    <td class="text-center">{{ DbCikara::countData('forum_diskusi',['forum_id',$item->id]) }}</td>
                                    <td>
                                      @if ($item->status == 'aktif')
                                        <span class="badge badge-success w-100">Aktif</span></td>
                                      @else
                                        <span class="badge badge-danger w-100">Non-Aktif</span></td>
                                      @endif
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
      <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('forum')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="aktif">
            <div class="modal-header">
            <h4 class="modal-title">Tambahkan Forum</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                <section class="p-3">
                  
                   <div class="form-group row">
                       <label for="" class="col-md-4">Nama Forum</label>
                       <input type="text" name="nama" id="nama" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-md-4">Keterangan Forum</label>
                      <textarea name="ket_forum" id="ket_forum" cols="30" rows="3" class="form-control col-md-8" required></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Gambar Forum</label>
                        <input type="file" name="poto" id="poto" class="form-control col-md-8" required>
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

