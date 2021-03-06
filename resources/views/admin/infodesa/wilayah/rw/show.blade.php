<x-adminlte-layout title="data rw" menu="wilayah">
    <x-slot name="header">
        <x-header judul="data wilayah administratif rt" active="daftar rt">
            <li class="breadcrumb-item"><a href="{{ url('dusun/'.Crypt::encryptString($rw->dusun_id))}}">Daftar RW</a></li>
        </x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('/dusun/'.Crypt::encryptString($rw->dusun_id))}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar RW"><i class="fas fa-angle-left"></i> Kembali</a>
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Rukun Tetangga (RT)" data-toggle="modal" data-target="#tambah" title="Tambah Data RT Baru"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-sm btn-flat float-right pop-info" title="Cetak Daftar Rukun Tetangga (RT)"><i class="fas fa-print"></i> CETAK</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <h4>RT - {{ $rw->nama_rw}}</h4>
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Aksi</th>
                                    <th>RT</th>
                                    <th>Ketua RT</th>
                                    <th>NIK Ketua RT</th>
                                    {{-- <th>RT</th> --}}
                                    <th>KK</th>
                                    <th>L+P</th>
                                    <th>L</th>
                                    <th>P</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($rt as $item)
                                @php
                                    $jumlahlakilaki = DbCikara::jumlahJk('rt',$item->id,'laki-laki');
                                    $jumlahperempuan = DbCikara::jumlahJk('rt',$item->id,'perempuan');
                                    $total          = $jumlahlakilaki + $jumlahperempuan;
                                @endphp
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/rt',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <button type="button" data-toggle="modal" data-nama_rt="{{ $item->nama_rt }}" data-nik="{{ $item->nik }}" data-rw_id="{{ $item->rw_id }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit RT
                                                    </button>
                                                    <div class="dropdown-divider"></div>
                                                    <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->nama_rt}}</td>
                                        @php
                                        $center = ($item->nik == '-') ? 'text-center' : NULL; 
                                    @endphp
                                    <td class="{{ $center }}">{{ DbCikara::namapenduduk($item->nik)}}</td>
                                    <td class="{{ $center }}">{{ $item->nik}}</td>
                                        <td class="text-center">{{ DbCikara::jumlahKK('rt',$item->id) }}</td>
                                        <td class="text-center">{{ $jumlahlakilaki }}</td>
                                        <td class="text-center">{{ $jumlahperempuan }}</td>
                                        <td class="text-center">{{ $total }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="10">tidak ada data</td>
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
                    <input type="hidden" name="s" value="listrt">
                    <input type="hidden" name="id" value="{{ $rw->id }}">
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
                <form action="{{ url('/rt')}}" method="post">
                    @csrf
                    <input type="hidden" name="rw_id" value="{{ $rw->id}}">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Wilayah Administratif RT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4 p-2">Nama RT</label>
                            <input type="text" name="nama_rt" id="nama_rt" class="form-control col-md-8" placeholder="Nama RT" required>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 p-2">NIK / Nama Ketua RT</label>
                            <select name="nik" id="nik" class="form-control col-md-8">
                                <option value="">-- Pilih Ketua RT --</option>
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->nik}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
                                @endforeach
                            </select>
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
                <form action="{{ route('rt.update','test')}}" method="post">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Wilayah Administratif RT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="rw_id" id="rw_id">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4 p-2">Nama RT</label>
                            <input type="text" name="nama_rt" id="nama_rt" class="form-control col-md-8" placeholder="Nama RT" required>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 p-2">NIK / Nama Ketua RT</label>
                            <select name="nik" id="nik" class="form-control col-md-8">
                                <option value="">-- Pilih Ketua RT --</option>
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->nik}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
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
    </x-slot>
    <x-slot name="kodejs">
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_rt = button.data('nama_rt')
                var rw_id = button.data('rw_id')
                var nik = button.data('nik')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #rw_id').val(rw_id);
                modal.find('.modal-body #nama_rt').val(nama_rt);
                modal.find('.modal-body #nik').val(nik);
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

