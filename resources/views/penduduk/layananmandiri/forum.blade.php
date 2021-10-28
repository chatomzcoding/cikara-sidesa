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
            <div class="card">
              {{-- <div class="card-header"> --}}
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                {{-- <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Ikuti Forum </a> --}}
                {{-- <a href="#" class="btn btn-outline-info btn-sm float-right"><i class="fas fa-print"></i> Cetak</a> --}}
              {{-- </div> --}}
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
                                <th>Total Diskusi</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($forum as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('forumdiskusi/'.$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-external-link-square-alt"></i> Lihat Forum</a>
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->ket_forum }}</td>
                                    <td class="text-center">{{ DbCikara::countData('forum_diskusi',['forum_id',$item->id]) }}</td>
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
                // "buttons": ["excel", "pdf", "print"]
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

