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
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-signature"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Laporan</span>
                      <span class="info-box-number">
                        {{ count($lapor) }}
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
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-double"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Laporan Selesai</span>
                      <span class="info-box-number">
                        {{ DbCikara::countData('lapor',['status','selesai']) }}
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
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-highlighter"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Laporan diproses</span>
                      <span class="info-box-number">
                        {{ DbCikara::countData('lapor',['status','proses']) }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-history"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Laporan menunggu</span>
                      <span class="info-box-number">
                        {{ DbCikara::countData('lapor',['status','menunggu']) }}
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
                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Kategori Laporan </a>
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
                                <th>Nama Penduduk</th>
                                <th>Isi Laporan</th>
                                <th>Kategori</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($lapor as $item)
                                @php
                                    $nama = DbCikara::datapenduduk($item->user_id,'id')->nama_penduduk;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                      <form id="data-{{ $item->id }}" action="{{url('/potensi',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                        {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-external-link-square-alt"></i></a> --}}
                                        <button type="button" data-toggle="modal" data-target="#ubah" data-nama="{{ $nama }}" data-id="{{ $item->id }}" data-isi="{{ $item->isi }}"  data-status="{{ $item->status }}" data-tanggapan="{{ $item->tanggapan }}"  data-kategori="{{ $item->kategori }}" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>

                                    </td>
                                    <td>{{ $nama }}</td>
                                    <td>{{ $item->isi }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('selesai')
                                              <span class="badge badge-success w-100">{{ $item->status }}</span></td>
                                                @break
                                            @case('menunggu')
                                              <span class="badge badge-danger w-100">{{ $item->status }}</span></td>
                                                @break
                                            @case('proses')
                                              <span class="badge badge-warning w-100">{{ $item->status }}</span></td>
                                                @break
                                            @default
                                                
                                        @endswitch
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
          <form action="{{ route('lapor.update','test')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
          <div class="modal-header">
          <h4 class="modal-title">Form untuk Menanggapi Laporan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <input type="hidden" name="id" id="id">
              <section class="p-3">
                <div class="form-group row">
                      <label for="" class="col-md-4">Nama Penduduk</label>
                      <input type="text" name="nama" id="nama" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                      <label for="" class="col-md-4">Kategori Laporan</label>
                      <input type="text" name="kategori" id="kategori" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                      <label for="" class="col-md-4">Status Saat ini</label>
                      <input type="text" name="status" id="statusini" class="form-control col-md-8" disabled>
                </div>
                 <div class="form-group row">
                     <label for="" class="col-md-4">Isi Laporan</label>
                     <textarea name="isi" id="isi" cols="30" rows="4" class="form-control col-md-8" disabled></textarea>
                  </div>
                 <div class="form-group row">
                     <label for="" class="col-md-4">Tanggapan Pemerintah Desa</label>
                     <textarea name="tanggapan" id="tanggapan" cols="30" rows="4" class="form-control col-md-8" required></textarea>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4">Beri Status Laporan</label>
                    <select name="status" id="status" class="col-md-8 form-control">
                      <option value="menunggu">Menunggu</option>
                      <option value="proses">Diproses</option>
                      <option value="selesai">Selesai</option>
                    </select>
              </div>
              </section>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN TANGGAPAN</button>
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
                var isi = button.data('isi')
                var status = button.data('status')
                var kategori = button.data('kategori')
                var nama = button.data('nama')
                var tanggapan = button.data('tanggapan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #isi').val(isi);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #statusini').val(status);
                modal.find('.modal-body #kategori').val(kategori);
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #tanggapan').val(tanggapan);
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

