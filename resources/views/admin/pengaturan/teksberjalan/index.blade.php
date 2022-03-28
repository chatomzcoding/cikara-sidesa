<x-adminlte-layout title="teks berjalan" menu="berjalan">
    <x-slot name="header">
        <x-header judul="Pengaturan Teks Berjalan" active="Daftar Teks Berjalan"></x-header>
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
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Teks Berjalan" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                    {{-- <a href="#" class="btn btn-outline-info btn-flat btn-sm float-right"><i class="fas fa-print"></i> CETAK</a> --}}
                    {!! button_logall($log) !!}
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Aksi</th>
                                    <th>Nama teks</th>
                                    <th>Isi Teks</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($info as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/info/'.$item->id.'?page=berjalan')}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-detail="{{ $item->detail }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i> Edit Teks
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{ $item->detail}}
                                            <br>
                                            {!! DbCikara::showlog(['sesi'=>'teksberjalan','id'=>$item->id]) !!}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">tidak ada data</td>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @include('sistem.view.modal-log')
        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ url('/info')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page" value="teksberjalan">
                    <input type="hidden" name="label" value="teksberjalan">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Teks Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                       <div class="form-group row">
                            <label for="" class="col-md-4">Judul Teks Berjalan <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama_slider') }}" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">isi Teks Berjalan</label>
                            <input type="text" name="detail" id="detail" value="{{ old('detail') }}" class="form-control col-md-8">
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
                <form action="{{ route('info.update','test')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Teks</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="page" value="teksberjalan">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Judul Teks Berjalan <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama_slider') }}" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">isi Teks Berjalan</label>
                            <input type="text" name="detail" id="detail" value="{{ old('detail') }}" class="form-control col-md-8">
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