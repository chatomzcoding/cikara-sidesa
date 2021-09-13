@extends('layouts.admin')

@section('title')
    Data {{ $judul.' '.$potensi->nama_potensi }}
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data  {{ $judul.' '.$potensi->nama_potensi }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('potensi')}}">Daftar Potensi</a></li>
            <li class="breadcrumb-item active">Detail  {{ $judul.' '.$potensi->nama_potensi }}</li>
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
            <div class="card">
              <div class="card-header">
                  {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                  <a href="{{ url('potensi') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-angle-left"></i> Kembali ke daftar potensi</a>
                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Sub Potensi {{ $potensi->nama_potensi }}</a>
                <a href="#" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> Cetak</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="12%">Aksi</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($potensisub as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/potensisub',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        {{-- <a href="{{ url('potensi/'.$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-external-link-square-alt"></i> </a> --}}
                                        <button type="button" data-toggle="modal" data-target="#ubah" title="" data-nama ="{{ $item->nama }}" data-detail ="{{ $item->detail }}" data-id ="{{ $item->id }}" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td><img src="{{ asset('img/desa/potensi/'.$item->gambar) }}" alt="poto potensi" width="150px"> </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->detail }}</td>
                                    {{-- <td><span class="badge badge-{{ $item[7] }} w-100">{{ $item[6] }}</span></td> --}}
                                </tr>
                            @endforeach
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
            <form action="{{ url('/potensisub')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="potensi_id" value="{{ $potensi->id }}">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Sub Potensi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan</label>
                        <textarea name="detail" id="detail" cols="30" rows="3" class="form-control col-md-8" required></textarea>
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
            <form action="{{ route('potensisub.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Sub Potensi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-md-4">Keterangan</label>
                       <textarea name="detail" id="detail" cols="30" rows="3" class="form-control col-md-8" required></textarea>
                    </div>
                    <div class="form-group row">
                         <label for="" class="col-md-4">Upload untuk ubah Gambar</label>
                         <input type="file" name="gambar" id="gambar" class="form-control col-md-8">
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
                var detail = button.data('detail')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #detail').val(detail);
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

