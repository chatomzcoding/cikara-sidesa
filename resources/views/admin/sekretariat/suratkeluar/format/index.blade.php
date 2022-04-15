<x-adminlte-layout title="Data Format Surat Keluar">
    <x-slot name="header">
        <x-header judul="Data Format Surat Keluar" p="Daftar Format Surat Keluar" active="Daftar Format Surat Keluar"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('suratkeluar') }}" class="btn btn-secondary btn-sm btn-flat"><i class="fas fa-angle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th>Kode Surat</th>
                                    <th>Nama Surat</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($formatsurat as $item)
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
                                                        <button type="button" data-toggle="modal"data-nama_surat="{{ $item->nama_surat }}" data-kode="{{ $item->kode }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i> Edit
                                                            </button>
                                                      <div class="dropdown-divider"></div>
                                                      {{-- <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button> --}}
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->kode}}</td>
                                        <td>{{ $item->nama_surat}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">tidak ada data</td>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                  </div>
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
                <h4 class="modal-title">Edit Format Surat</h4>
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
                            <label for="" class="col-md-4">Nama Surat</label>
                            <input type="text" name="nama_surat" id="nama_surat" class="form-control col-md-8" required>
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
                var nama_surat = button.data('nama_surat')
                var kode = button.data('kode')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_surat').val(nama_surat);
                modal.find('.modal-body #kode').val(kode);
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