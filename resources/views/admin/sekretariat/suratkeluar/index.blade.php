<x-adminlte-layout title="Data Surat Keluar">
    <x-slot name="header">
        <x-header judul="Data Surat Keluar" p="Daftar Surat Keluar" active="Daftar Surat Keluar"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                      <a href="#" data-target="#buat" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i> Buat Surat</a>
                      <a href="{{ url('suratkeluar?s=format') }}" class="btn btn-info btn-sm btn-flat"><i class="fas fa-list"></i> Format Surat Keluar</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th>Dibuat</th>
                                    <th>Nomor Surat</th>
                                    <th>Nama Surat</th>
                                    <th width="30%">Perihal</th>
                                    <th>Status Surat</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($suratkeluar as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            {{-- <form id="data-{{ $item->id }}" action="{{url('/suratkeluar',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form> --}}
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                      <a class="dropdown-item text-primary" href="{{ url('datasuratkeluar/'.$item->id)}}"><i class="fas fa-list"></i> Detail Surat</a>
                                                      <div class="dropdown-divider"></div>
                                                      {{-- <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button> --}}
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->created_at}}</td>
                                        <td>{{ $item->nomor_surat}}</td>
                                        <td>{{ $item->formatsurat->nama_surat}}</td>
                                        <td>
                                            @php
                                                $isi = json_decode($item->isi)
                                            @endphp
                                            @isset($isi->perihal)
                                                {{ $isi->perihal }}
                                            @endisset
                                        </td>
                                        <td class="text-center">
                                            @switch($item->konfirmasi)
                                                @case('sekretaris desa')
                                                    <span class="badge badge-warning">Menunggu Konfirmasi <br> Sekretaris Desa</span>
                                                    @break
                                                @case('kepala desa')
                                                    <span class="badge badge-warning">Menunggu Konfirmasi <br> Kepala Desa</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-success">surat bisa disebarkan</span>
                                            @endswitch
                                        </td>
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
        <div class="modal fade" id="buat">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">List Daftar Surat Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="list-group">
                            @foreach ($formatsurat as $item)
                                <a href="{{ url('suratkeluar/create?id='.$item->id) }}" class="list-group-item list-group-item-action text-uppercase">{{ $item->nama_surat }}</a>
                            @endforeach
                          </div>
                    </section>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
            </div>
        </div>
        <div class="modal fade" id="ubah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route('suratkeluar.update','test')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Klasifikasi Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Status</label>
                            <select name="status" id="status" class="form-control col-md-8">
                                @foreach (list_status() as $item)
                                    <option value="{{ $item}}">{{ $item}}</option>
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
                var nama = button.data('nama')
                var kode = button.data('kode')
                var keterangan = button.data('keterangan')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #kode').val(kode);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel"]
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