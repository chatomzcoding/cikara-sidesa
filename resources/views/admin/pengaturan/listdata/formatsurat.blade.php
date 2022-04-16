<x-adminlte-layout title="list data" menu="listdata">
    <x-slot name="header">
        <x-header judul="data list" active="daftar list"></x-header>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Daftar List Data</h3>
                    {{-- {!! button_logall($log) !!} --}}
                  </div>
                  <div class="card-body">
                      @include('sistem.notifikasi')
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                <div class="card-body">
                                    <section class="mb-1">
                                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data List" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah List Format Surat</a>
                                    </section>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="text-center">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Aksi</th>
                                                    <th>Nama</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-capitalize">
                                                @forelse ($listdata as $item)
                                                <tr>
                                                        <td class="text-center">{{ $loop->iteration}}</td>
                                                        <td class="text-center">
                                                            <form id="data-{{ $item->id }}" action="{{url('/listdata/'.$item->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <a href="{{ url('listdata/'.$item->id.'/edit') }}" class="dropdown-item text-success"><i class="fa fa-edit"></i> Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                        <td>{{ $item->formatsurat->nama_surat}}</td>
                                                        <td>
                                                            @php
                                                                $keterangan = json_decode($item->keterangan)
                                                            @endphp
                                                            <ul>
                                                                @foreach ($keterangan as $i)
                                                                    <li>
                                                                        {{ $i->label.' | '.$i->key }} 
                                                                    </li>                                                                
                                                                @endforeach
                                                            </ul>
                                                        </td>
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
                </div>
              </div>
            </div>
        </div>
        {{-- @include('sistem.view.modal-log') --}}
        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ url('/listdata')}}" method="post">
                    @csrf
                    <input type="hidden" name="formatsurat" value="TRUE">
                <div class="modal-header">
                <h4 class="modal-title">Tambah List Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                       <div class="form-group row">
                            <label for="" class="col-md-4">Label List</label>
                            <input type="text" name="label" id="label" value="format_surat" class="form-control col-md-8" readonly>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Nama List <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan (opsional)</label>
                            <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" class="form-control col-md-8">
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
                <form action="{{ route('listdata.update','test')}}" method="post">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit List Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Nama List <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan (opsional)</label>
                            <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" class="form-control col-md-8">
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
                var keterangan = button.data('keterangan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #keterangan').val(keterangan);
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