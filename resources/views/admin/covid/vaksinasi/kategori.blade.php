<x-adminlte-layout title="data jenis vaksin" menu="vaksinasi">
    <x-slot name="header">
        <x-header judul="data jenis vaksin" active="daftar jenis vaksin"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                      <a href="{{ url('/vaksinasi')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali Ke Daftar Vaksinasi"><i class="fas fa-angle-left"></i> Kembali</a>
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Vaksin" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                    {!! button_logall($log) !!}
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th>Nama Jenis Vaksin</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($kategori as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/kategori',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <button type="button" data-toggle="modal" data-nama_kategori="{{ $item->nama_kategori }}" data-keterangan_kategori="{{ $item->keterangan_kategori }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i> Edit Data
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->nama_kategori}}</td>
                                        <td>{{ $item->keterangan_kategori}} <br>
                                            {!! DbCikara::showlog(['sesi'=>'kategorivaksin','id'=>$item->id]) !!}</td>
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
                <form action="{{ url('/kategori')}}" method="post">
                    @csrf
                    <input type="hidden" name="label" value="vaksinasi">
                    <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jenis Vaksin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Nama Jenis Vaksin <strong class="text-danger">*</strong></label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control col-md-8" placeholder="masukkan nama jenis vaksin" required>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan <strong class="text-danger">*</strong></label>
                            <input type="text" name="keterangan_kategori" id="keterangan_kategori" class="form-control col-md-8" maxlength="255" placeholder="tambahkan keterangan" required>
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
                <form action="{{ route('kategori.update','test')}}" method="post">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Jenis Vaksin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Nama Jenis Vaksin <strong class="text-danger">*</strong></label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control col-md-8" placeholder="masukkan nama jenis vaksin" required>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan <strong class="text-danger">*</strong></label>
                            <input type="text" name="keterangan_kategori" id="keterangan_kategori" class="form-control col-md-8" maxlength="255" placeholder="tambahkan keterangan" required>
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
                var nama_kategori = button.data('nama_kategori')
                var keterangan_kategori = button.data('keterangan_kategori')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_kategori').val(nama_kategori);
                modal.find('.modal-body #keterangan_kategori').val(keterangan_kategori);
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

