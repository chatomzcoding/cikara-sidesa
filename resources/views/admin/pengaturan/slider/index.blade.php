<x-adminlte-layout title="slider" menu="slider">
    <x-slot name="header">
        <x-header judul="Pengaturan Slider" active="Daftar Slider"></x-header>
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
                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Slider Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
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
                                    <th>Gambar</th>
                                    <th>Nama Slider</th>
                                    <th>Keterangan</th>
                                    {{-- <th>Link</th> --}}
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($slider as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/slider',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <button type="button" data-toggle="modal" data-nama_slider="{{ $item->nama_slider }}" data-keterangan="{{ $item->keterangan }}" data-link="{{ $item->link }}" data-status="{{ $item->status }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i> Edit Slider
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td><img src="{{ asset('/img/pengaturan/slider/'.$item->gambar)}}" alt="" width="150px"></td>
                                        <td>{{ $item->nama_slider}}</td>
                                        <td>{{ $item->keterangan}}
                                            <br>
                                            {!! DbCikara::showlog(['sesi'=>'slider','id'=>$item->id]) !!}
                                        </td>
                                        {{-- <td>
                                            @if (!is_null($item->link))
                                                <a href="{{ $item->link}}" target="_blank">link</a>
                                            @endif
                                        </td> --}}
                                        <td class="text-center">{{ $item->status}}</td>
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
        @include('sistem.view.modal-log')
        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ url('/slider')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="link" value="">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Slider Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                       <div class="form-group row">
                            <label for="" class="col-md-4">Nama Slider <span class="text-danger">*</span></label>
                            <input type="text" name="nama_slider" id="nama_slider" value="{{ old('nama_slider') }}" class="form-control col-md-8" required>
                       </div>
                       {{-- <div class="form-group row">
                            <label for="" class="col-md-4">Link</label>
                            <input type="url" name="link" id="link" class="form-control col-md-8">
                       </div> --}}
                       <div class="form-group row">
                            <label for="" class="col-md-4">Unggah Gambar <span class="text-danger">*</span></label>
                            <input type="file" name="gambar" id="gambar" class="form-control col-md-8" required>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan (opsional)</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control col-md-8">{{ old('keterangan') }}</textarea>
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
                <form action="{{ route('slider.update','test')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="link" id="link">
                    <section class="p-3">
                        <div class="form-group row">
                            <label for="" class="col-md-4">Nama Slider <span class="text-danger">*</span></label>
                            <input type="text" name="nama_slider" id="nama_slider" class="form-control col-md-8" required>
                       </div>
                       {{-- <div class="form-group row">
                            <label for="" class="col-md-4">Link</label>
                            <input type="url" name="link" id="link" class="form-control col-md-8">
                       </div> --}}
                       <div class="form-group row">
                            <label for="" class="col-md-4">Unggah Gambar (upload jika ingin mengubah)</label>
                            <input type="file" name="gambar" id="gambar" class="form-control col-md-8">
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Status Slider</label>
                            <select name="status" id="status" class="form-control col-md-8" required>
                                @foreach (list_status() as $item)
                                    <option value="{{ $item}}">{{ $item}}</option>
                                @endforeach
                            </select>
                       </div>
                       <div class="form-group row">
                            <label for="" class="col-md-4">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control col-md-8"></textarea>
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
                var nama_slider = button.data('nama_slider')
                var link = button.data('link')
                var kategori_informasi = button.data('kategori_informasi')
                var keterangan = button.data('keterangan')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_slider').val(nama_slider);
                modal.find('.modal-body #link').val(link);
                modal.find('.modal-body #kategori_informasi').val(kategori_informasi);
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