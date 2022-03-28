<x-adminlte-layout title="Data {{ $judul }}">
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
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <table width="100%">
                            <tr>
                                <th>Nama Lapak</th>
                                <td>: {{ $lapak->nama_lapak }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Bergabung</th>
                                <td>: {{ $lapak->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>: {{ $lapak->tentang }}</td>
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
                      <span class="info-box-number">{{ count($produk) }}</span>
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
                      <span class="info-box-text">Total Dilihat</span>
                      <span class="info-box-number">-</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                
              </div>
            <div class="card">
              <div class="card-header">
                <a href="{{ url('tampilan/lapak') }}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar lapak"><i class="fas fa-angle-left"></i> Kembali </a>
                @if ($user->level <> 'penduduk')
                {!! button_logall($log) !!}
                @endif
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
                                <th>Dilihat</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($produk as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/produk',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                              <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <div class="dropdown-menu" role="menu">
                                                <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                              </div>
                                          </div> 
                                    </td>
                                    <td><img src="{{ asset('img/penduduk/produk/'.$item->gambar) }}" alt="" width="100px"></td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->keterangan}} 
                                      @if ($user->level <> 'penduduk')
                                      <br>
                                      {!! DbCikara::showlog(['sesi'=>'produk','id'=>$item->id]) !!}
                                      @endif
                                    </td>
                                    <td>{{ rupiah($item->harga) }}</td>
                                    <td class="text-center">{{ $item->dilihat}}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @include('sistem.view.modal-log')
  </x-slot>
  <x-slot name="kodejs">
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
  </x-slot>
</x-adminlte-layout>