<x-adminlte-layout title="potensi desa" menu="potensi">
  <x-slot name="header">
    <x-header judul="data potensi desa" active="daftar potensi desa"></x-header>
  </x-slot>
  <x-slot name="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- statistik -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-campground"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Potensi</span>
                      <span class="info-box-number">
                        {{ $total['potensi'] }}
                        {{-- <small>%</small> --}}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-archway"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Sub Potensi</span>
                      <span class="info-box-number">
                        {{ $total['subpotensi'] }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                {{-- <div class="clearfix hidden-md-up"></div> --}}
      
                {{-- <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Transaksi</span>
                      <span class="info-box-number">40</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-eye"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Dilihat</span>
                      <span class="info-box-number">
                          {{ $total['dilihat'] }}
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
                <a href="#" class="btn btn-outline-primary btn-sm pop-info" data-toggle="modal" data-target="#tambah" title="Tambah Data Potensi Baru"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" data-toggle="modal" data-target="#cetakdokumen" title="Cetak Daftar Potensi" class="btn btn-outline-info btn-sm float-right pop-info"><i class="fas fa-print"></i> CETAK</a>
                {!! button_logall($log) !!}
    
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
                                <th>Nama Potensi</th>
                                <th>Keterangan</th>
                                <th>Dilihat</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($potensi as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/potensi',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                              <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item text-primary" href="{{ url('potensi/'.$item->id) }}"><i class="fas fa-list"></i> Detail Potensi</a>
                                                  <button type="button" data-toggle="modal" data-nama_potensi ="{{ $item->nama_potensi }}" data-keterangan_potensi ="{{ $item->keterangan_potensi }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                  <i class="fa fa-edit"></i> Edit Potensi
                                                  </button>
                                                <div class="dropdown-divider"></div>
                                                <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                              </div>
                                          </div>
                                    </td>
                                    <td><img src="{{ asset('img/desa/potensi/'.$item->poto_potensi) }}" alt="poto potensi" width="150px"> </td>
                                    <td>{{ $item->nama_potensi }}</td>
                                    <td>{{ $item->keterangan_potensi }}  <br>
                                      {!! DbCikara::showlog(['sesi'=>'potensi','id'=>$item->id]) !!}</td>
                                    <td class="text-center">{{ $item->dilihat }}</td>
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
    <div class="modal fade" id="cetakdokumen">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
          @csrf
          <input type="hidden" name="s" value="potensi">
          {{-- <input type="hidden" name="id" value="{{ $rw->id }}"> --}}
      <div class="modal-header">
      <h4 class="modal-title">Informasi Cetak Dokumen</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body p-3">
          <section class="p-3">
              <div class="form-group row">
                  <label for="" class="col-md-4">Mengetahui</label>
                  <select name="staf" id="staf" class="form-control col-md-8" required>
                      <option value="">-- Pilih Staf --</option>
                      @foreach (DbCikara::showtable('staf',['status_pegawai','aktif']) as $item)
                      <option value="{{ $item->id}}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan)}}</option>
                      @endforeach
                  </select>
                      
              </div>
          </section>
      </div>
      <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
      <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> CETAK SEKARANG</button>
      </div>
    </form>
    </div>
    </div>
    </div>
    @include('sistem.view.modal-log')
    
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/potensi')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Potensi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Potensi</label>
                        <input type="text" name="nama_potensi" id="nama_potensi" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Unggah Gambar</label>
                        <input type="file" name="poto_potensi" id="poto_potensi" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan Potensi</label>
                        <textarea name="keterangan_potensi" id="keterangan_potensi" cols="30" rows="3" class="form-control col-md-8" required></textarea>
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
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('potensi.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Potensi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Potensi</label>
                        <input type="text" name="nama_potensi" id="nama_potensi" class="form-control col-md-8" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan Potensi</label>
                        <textarea name="keterangan_potensi" id="keterangan_potensi" cols="30" rows="3" class="form-control col-md-8" required></textarea>
                    </div>
                    <div class="form-group row">
                          <label for="" class="col-md-4">Upload jika ingin mengubah Gambar</label>
                          <input type="file" name="poto_potensi" id="poto_potensi" class="form-control col-md-8">
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
  </x-slot>
  <x-slot name="kodejs">
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_potensi = button.data('nama_potensi')
                var keterangan_potensi = button.data('keterangan_potensi')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_potensi').val(nama_potensi);
                modal.find('.modal-body #keterangan_potensi').val(keterangan_potensi);
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
  </x-slot>
</x-adminlte-layout>

