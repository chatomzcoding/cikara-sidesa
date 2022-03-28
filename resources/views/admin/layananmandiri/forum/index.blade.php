<x-adminlte-layout title="Data {{ $judul }}" menu="forumpenduduk">
  <x-slot name="header">
    <x-header judul="Data {{ $judul }}" active="Daftar {{ $judul }}"></x-header>
  </x-slot>
  <x-slot name="content">
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
                                      <form id="data-{{ $item->id }}" action="{{url('/forum',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                        <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                          <a class="dropdown-item text-primary" href="{{ url('/forumdiskusi/'.$item->id)}}"><i class="fas fa-list"></i> Detail Forum</a>
                                          <div class="dropdown-divider"></div>
                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                        </div>
                                    </div>
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
  </x-slot>
  <x-slot name="kodejs">
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
  </x-slot>
</x-adminlte-layout>