<x-adminlte-layout title="data pemerintah desa" menu="pemerintahdesa">
    <x-slot name="header">
        <x-header judul="data pemerintahan desa" active="daftar pemerintahan desa"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                    {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                    {{-- <a href="{{ url('/staf/create')}}" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Aparat Pemerintahan"><i class="fas fa-plus"></i> Tambah </a> --}}
                    <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Aparat Pemerintahan"><i class="fas fa-plus"></i> Tambah </a>
                    <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar Aparat Pemerintahan"><i class="fas fa-print"></i> CETAK</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <section class="mb-3">
                          <form action="{{ url('staf') }}" method="get">
                              @csrf
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">Status Pegawai</label>
                                    <select name="status" id="" class="form-control form-control-sm" onchange="this.form.submit()">
                                        <option value="semua">-- Semua --</option>
                                        @foreach (list_status() as $item)
                                            <option value="{{ $item}}" @if ($item == $status)
                                                selected
                                            @endif>{{ strtoupper($item)}}</option>
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
                                    <th>Nama, NIP/NIPD, NIK</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Pangkat / Golongan</th>
                                    <th>Jabatan</th>
                                    <th>Periode</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($staf as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/staf',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item text-primary" href="{{ url('/staf/'.Crypt::encryptString($item->id))}}"><i class="fas fa-file"></i> Detail Data</a>
                                                    @if (aksesadmin())
                                                        <a class="dropdown-item text-success" href="{{ url('/staf/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Edit Data</a>
                                                        <div class="dropdown-divider"></div>
                                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->nama_pegawai.', '.$item->nip.', '.$item->nipd}}</td>
                                        <td>{{ $item->tempat_lahir.', '.$item->tgl_lahir}}</td>
                                        <td>{{ $item->jk}}</td>
                                        <td>{{ $item->agama}}</td>
                                        <td class="text-center">{{ $item->golongan}}</td>
                                        <td>{{ $item->jabatan}}</td>
                                        <td>{{ $item->masa_jabatan}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="13">tidak ada data</td>
                                    </tr>
                                @endforelse
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
                    <input type="hidden" name="s" value="staf">
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
                <form action="{{ url('/staf/create')}}" method="get">
                    @csrf
                <div class="modal-header">
                <h4 class="modal-title">Tambah Staf</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                       <div class="form-group row">
                            <label for="" class="col-md-4">Mengetahui</label>
                            <div class="col-md-8">
                                <select name="penduduk_id" id="penduduk_id" class="form-control penduduk" data-width="100%" required>
                                    <option value="">-- Pilih Penduduk --</option>
                                    @foreach (DbCikara::showtable('penduduk') as $item)
                                    <option value="{{ $item->id}}">{{ strtoupper($item->nama_penduduk.' | '.$item->nik)}}</option>
                                    @endforeach
                                </select>
                            </div>
                       </div>
                    </section>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Staf</button>
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
                var nama_unit = button.data('nama_unit')
                var manajer_unit = button.data('manajer_unit')
                var staf_unit = button.data('staf_unit')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_unit').val(nama_unit);
                modal.find('.modal-body #manajer_unit').val(manajer_unit);
                modal.find('.modal-body #staf_unit').val(staf_unit);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false,
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
