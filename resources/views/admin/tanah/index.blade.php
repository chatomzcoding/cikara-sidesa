<x-adminlte-layout title="pertanahan" menu="tanah">
    <x-slot name="header">
        <x-header judul="data pertanahan" active="daftar pertanahan"></x-header>
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
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-map"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">Total Tanah</span>
                          <span class="info-box-number">
                            {{ count($tanah) }}
                            {{-- <small>%</small> --}}
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                  </div>
                <div class="card">
                  <div class="card-header">
                    {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                    <a href="#" class="btn btn-outline-primary btn-sm pop-info" data-toggle="modal" data-target="#tambah" title="Tambah Data Potensi Baru"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" class="btn btn-outline-success btn-sm pop-info" data-toggle="modal" data-target="#import" title="Tambah Data Potensi Baru"><i class="fas fa-file-import"></i> import</a>
                    <a href="#" data-toggle="modal" data-target="#cetakdokumen" title="Cetak Daftar Potensi" class="btn btn-outline-info btn-sm float-right pop-info"><i class="fas fa-print"></i> CETAK</a>
                    {{-- {!! button_logall($log) !!} --}}
    
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                     
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="3" width="5%">No</th>
                                    <th rowspan="3" width="10%">Aksi</th>
                                    <th rowspan="3">NOP</th>
                                    <th rowspan="3">Nama Wajib Pajak</th>
                                    <th rowspan="3">Alamat WP</th>
                                    <th rowspan="3">Alamat OP</th>
                                    <th rowspan="3">Kode ZNT</th>
                                    <th colspan="4">Luas (M2)</th>
                                    <th rowspan="3">Ket</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Dikenakan PBB</th>
                                    <th colspan="2">Tidak Dikenakan PBB</th>
                                </tr>
                                <tr>
                                    <th>BUMI</th>
                                    <th>BANGUNAN</th>
                                    <th>BUMI</th>
                                    <th>BANGUNAN</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @foreach ($tanah as $item)
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
                                                      <button type="button" data-toggle="modal" data-nop ="{{ $item->nop }}" data-namawp ="{{ $item->namawp }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                      <i class="fa fa-edit"></i> Edit 
                                                      </button>
                                                    <div class="dropdown-divider"></div>
                                                    <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                  </div>
                                              </div>
                                        </td>
                                        <td>{{ $item->nop }}</td>
                                        <td>{{ $item->namawp }}
                                            {{-- {!! DbCikara::showlog(['sesi'=>'potensi','id'=>$item->id]) !!} --}}
                                        </td>
                                        <td>{{ $item->alamatwp }}
                                        <td>{{ $item->alamatop }}
                                        <td>{{ $item->kode_znt }}
                                        <td class="text-center">{{ $item->pbb_bumi }}
                                        <td class="text-center">{{ $item->pbb_bangunan }}
                                        <td class="text-center">{{ $item->nonpbb_bumi }}
                                        <td class="text-center">{{ $item->nonpbb_bangunan }}
                                        <td>{{ $item->keterangan }}
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
        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ url('/tanah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                <h4 class="modal-title">Tambah Pertanahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                       <div class="form-group row">
                            <label for="" class="col-md-4">Nomor NOP</label>
                            <input type="text" name="nop" id="nop" class="form-control col-md-8" value="{{ old('nop') }}" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Nama Wajib Pajak</label>
                            <input type="text" name="namawp" id="namawp" class="form-control col-md-8" value="{{ old('namawp') }}" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Alamat WP</label>
                            <input type="text" name="alamatwp" id="alamatwp" class="form-control col-md-8" value="{{ old('alamatwp') }}" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Alamat OP</label>
                            <input type="text" name="alamatop" id="alamatop" class="form-control col-md-8" value="{{ old('alamatop') }}" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Kode ZNT</label>
                            <input type="text" name="kode_znt" id="kode_znt" class="form-control col-md-8" value="{{ old('kode_znt') }}" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">PBB Bumi</label>
                            <input type="text" name="pbb_bumi" id="pbb_bumi" class="form-control col-md-8" value="{{ old('pbb_bumi') }}">
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">PBB Bangunan</label>
                            <input type="text" name="pbb_bangunan" id="pbb_bangunan" class="form-control col-md-8" value="{{ old('pbb_bangunan') }}">
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Non PBB Bumi</label>
                            <input type="text" name="nonpbb_bumi" id="nonpbb_bumi" class="form-control col-md-8" value="{{ old('nonpbb_bumi') }}">
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Non PBB Bumi</label>
                            <input type="text" name="nonpbb_bangunan" id="nonpbb_bangunan" class="form-control col-md-8" value="{{ old('nonpbb_bangunan') }}">
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control col-md-8" value="{{ old('keterangan') }}">
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