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
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope-open-text"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Format Surat</span>
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
                {{-- <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Surat Selesai</span>
                      <span class="info-box-number">
                        {{ $total['selesai'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Klasifikasi Surat</span>
                      <span class="info-box-number">
                        {{ $total['klasifikasi'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Surat Dalam Proses</span>
                      <span class="info-box-number">
                        {{ $total['proses'] }}

                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->
              </div>
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Format Surat Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                <a href="{{ url('cetakdata?s=formatsurat&kategori='.$filter['kategori']) }}" target="_blank" class="btn btn-outline-info btn-sm float-right pop-info" title="Cetak Daftar Format Surat"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                    <form action="{{ url('formatsurat') }}" method="get">
                      @csrf
                      <div class="row">
                          <div class="form-group col-md-4">
                              <select name="kategori" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                  <option value="semua">-- Semua Kategori --</option>
                                  @foreach (list_kategorisurat() as $item)
                                      <option value="{{ $item}}" @if ($filter['kategori'] == $item)
                                          selected
                                      @endif>{{ strtoupper($item) }}</option>
                                  @endforeach
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
                                <th width="15%">Aksi</th>
                                <th>Nama Surat</th>
                                <th>Kode Surat</th>
                                <th>Klasifikasi</th>
                                <th>Kategori</th>
                                <th>Template</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($formatsurat as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                      <form id="data-{{ $item->id }}" action="{{url('/formatsurat',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                          <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <div class="dropdown-menu" role="menu">
                                              <button type="button" data-toggle="modal" data-nama_surat="{{ $item->nama_surat }}" data-kode="{{ $item->kode }}" data-kategori="{{ $item->kategori }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                              <i class="fa fa-edit"></i> Edit Format Surat
                                              </button>
                                            <div class="dropdown-divider"></div>
                                            <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                          </div>
                                      </div>
                                    </td>
                                    <td>{{ $item->nama_surat }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ DbCikara::showtablefirst('klasifikasi_surat',['id',$item->klasifikasisurat_id])->nama  }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td><a href="{{ asset('file/surat/'.$item->file_surat) }}" target="_blank">Lihat Surat</a></td>
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
                <form action="{{ url('formatsurat')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                <h4 class="modal-title">Tambahkan Format Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                    <section class="p-3">
                      
                       <div class="form-group row">
                           <label for="" class="col-md-4">Nama Surat</label>
                           <input type="text" name="nama_surat" id="nama_surat" class="form-control col-md-8" required>
                        </div>
                       <div class="form-group row">
                           <label for="" class="col-md-4">Kode Surat</label>
                           <input type="text" name="kode" id="kode" class="form-control col-md-8" required>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-4">Kode Klasifikasi Surat</label>
                          <select name="klasifikasisurat_id" id="" class="form-control col-md-8" required>
                              @foreach ($klasifikasisurat as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-4">Kategori Surat</label>
                          <select name="kategori" id="kategori" class="form-control col-md-8" required>
                              @foreach (list_kategorisurat() as $item)
                                  <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-4">Masa Berlaku</label>
                          <input type="number" name="nilai_masaberlaku" class="col-md-2 form-control" min="1" max="31" value="1" required>
                          <select name="status_masaberlaku" id="" class="form-control col-md-6" required>
                              <option value="hari">Hari</option>
                              <option value="minggu">Minggu</option>
                              <option value="bulan">Bulan</option>
                              <option value="tahun">Tahun</option>
                          </select>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-4">Layanan Mandiri</label>
                          <select name="layanan_mandiri" id="" class="form-control col-md-8" required>
                              <option value="ya">Ya</option>
                              <option value="tidak">Tidak</option>
                          </select>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4">File Surat</label>
                            <input type="file" name="file_surat" id="poto" class="form-control col-md-8" required>
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
        {{-- modal edit --}}
    <div class="modal fade" id="ubah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('formatsurat.update','test')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
          <div class="modal-header">
          <h4 class="modal-title">Edit Format Surat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body p-3">
              <input type="hidden" name="id" id="id">
              <section class="p-3">
                <div class="form-group row">
                  <label for="" class="col-md-4">Nama Surat</label>
                  <input type="text" name="nama_surat" id="nama_surat" class="form-control col-md-8" required>
               </div>
              <div class="form-group row">
                  <label for="" class="col-md-4">Kode Surat</label>
                  <input type="text" name="kode" id="kode" class="form-control col-md-8" required>
               </div>
               <div class="form-group row">
                <label for="" class="col-md-4">Kategori Surat</label>
                <select name="kategori" id="kategori" class="form-control col-md-8" required>
                    @foreach (list_kategorisurat() as $item)
                        <option value="{{ $item }}">{{ strtoupper($item) }}</option>
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
        <!-- /.modal -->
    @section('script')
    <script>
      $('#ubah').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var nama_surat = button.data('nama_surat')
          var kode = button.data('kode')
          var id = button.data('id')
  
          var modal = $(this)
  
          modal.find('.modal-body #nama_surat').val(nama_surat);
          modal.find('.modal-body #kode').val(kode);
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

