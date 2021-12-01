@extends('layouts.admin')

@section('title')
    Data Informasi Publik
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Informasi Publik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Informasi Publik</li>
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
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Informasi Publik Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i>  Tambah</a>
                {{-- <a href="#" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-sync"></i> Bersihkan Filter</a> --}}
                <a href="#" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Informasi Publik"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  {{-- <section class="text-right my-2">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Data</button>
                  </section> --}}
                  <section class="mb-3">
                      <form action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">-- Semua --</option>
                                    @foreach (list_status() as $item)
                                        <option value="{{ $item}}">{{ $item}}</option>
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
                                <th>Aksi</th>
                                <th>Judul</th>
                                <th>Kategori Info Publik</th>
                                <th>Tahun</th>
                                <th>Aktif</th>
                                <th>Dimuat Pada</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($informasipublik as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/informasipublik',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <button type="button" data-toggle="modal" data-judul_dokumen="{{ $item->judul_dokumen }}" data-nama_dokumen="{{ $item->nama_dokumen }}" data-kategori_informasi="{{ $item->kategori_informasi }}" data-tahun="{{ $item->tahun }}" data-status="{{ $item->status }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Kelompok
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->judul_dokumen}}</td>
                                    <td>{{ $item->kategori_informasi}}</td>
                                    <td>{{ $item->tahun}}</td>
                                    <td>{{ $item->status}}</td>
                                    <td>{{ $item->created_at}}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="7">tidak ada data</td>
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
            <form action="{{ url('/informasipublik')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Informasi Publik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Judul Dokumen</label>
                        <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Dokumen</label>
                        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Informasi Publik</label>
                        <select name="kategori_informasi" id="kategori_informasi" class="form-control col-md-8" required>
                            <option value="">-- Pilih Kategori Informasi Publik</option>
                            @foreach (list_kategoriinformasipublik() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Tahun</label>
                        <input type="year" name="tahun" id="tahun" maxlength="4" class="form-control col-md-8" required>
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
            <form action="{{ route('informasipublik.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Informasi Publik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Judul Dokumen</label>
                        <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Dokumen (abaikan jika tidak ingin mengubah)</label>
                        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control col-md-8">
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Kategori Informasi Publik</label>
                        <select name="kategori_informasi" id="kategori_informasi" class="form-control col-md-8" required>
                            <option value="">-- Pilih Kategori Informasi Publik</option>
                            @foreach (list_kategoriinformasipublik() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Status Informasi Publik</label>
                        <select name="status" id="status" class="form-control col-md-8" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach (list_status() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Tahun</label>
                        <input type="year" name="tahun" id="tahun" maxlength="4" class="form-control col-md-8" required>
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
                var nama_dokumen = button.data('nama_dokumen')
                var judul_dokumen = button.data('judul_dokumen')
                var kategori_informasi = button.data('kategori_informasi')
                var tahun = button.data('tahun')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_dokumen').val(nama_dokumen);
                modal.find('.modal-body #judul_dokumen').val(judul_dokumen);
                modal.find('.modal-body #kategori_informasi').val(kategori_informasi);
                modal.find('.modal-body #tahun').val(tahun);
                modal.find('.modal-body #status').val(status);
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

