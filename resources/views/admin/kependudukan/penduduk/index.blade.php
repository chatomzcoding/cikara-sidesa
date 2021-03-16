<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Penduduk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Data Penduduk</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('/penduduk/create')}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-plus"></i> Penduduk Domisili</a>
                <a href="#" class="btn btn-outline-danger btn-flat btn-sm"><i class="fas fa-trash"></i> Hapus Data Terpilih</a>
                <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-list"></i> Pilih Aksi Lainnya</a>
                <a href="#" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-sync"></i> Bersihkan Filter</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  {{-- <section class="text-right my-2">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Data</button>
                  </section> --}}
                  <section class="mb-3">
                      <form action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">Status Penduduk</option>
                                    <option value="">Tetap</option>
                                    <option value="">Tidak Tetap</option>
                                    <option value="">Pendatang</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">Status Dasar</option>
                                    <option value="">Hidup</option>
                                    <option value="">Mati</option>
                                    <option value="">Pindah</option>
                                    <option value="">Hilang</option>
                                    <option value="">Tidak Valid</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="">Laki - laki</option>
                                    <option value="">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">Dusun</option>
                                    <option value="">Dusun 1</option>
                                    <option value="">Dusun 2</option>
                                    <option value="">Dusun 3</option>
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
                                <th>NIK</th>
                                <th>Tag ID Card</th>
                                <th>Nama</th>
                                <th>No. KK</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>No. Rumah Tangga</th>
                                <th>Alamat</th>
                                <th>Dusun</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Pendidikan dalam KK</th>
                                <th>Umur</th>
                                <th>Pekerjaan</th>
                                <th>Kawin</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($penduduk as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td>{{ $item->nama_unit}}</td>
                                <td>{{ $item->manajer_unit}}</td>
                                <td>{{ $item->staf_unit}}</td>
                                <td class="text-center">
                                    <form id="data-{{ $item->id }}" action="{{url('/unit',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                    <a href="{{ url('/cikaradivisi',Crypt::encryptString($item->id))}}" class="btn btn-link btn-success btn-lg"><i class="fas fa-external-link-alt"></i></a>
                                    <button type="button" data-toggle="modal" data-nama_unit="{{ $item->nama_unit }}" data-manajer_unit="{{ $item->manajer_unit }}" data-staf_unit="{{ $item->staf_unit }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button> &nbsp;&nbsp;
                                    <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">belum ada data</td>
                                </tr>
                            @endforelse
                        <tfoot class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Aksi</th>
                                <th>NIK</th>
                                <th>Tag ID Card</th>
                                <th>Nama</th>
                                <th>No. KK</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>No. Rumah Tangga</th>
                                <th>Alamat</th>
                                <th>Dusun</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Pendidikan dalam KK</th>
                                <th>Umur</th>
                                <th>Pekerjaan</th>
                                <th>Kawin</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    {{-- <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/unit')}}" method="post">
                @csrf
                <input type="hidden" name="logo_unit" value="">
            <div class="modal-header">
            <h4 class="modal-title">Form Tambah Unit Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">email</label>
                        <input type="email" name="email" class="col-md-8 form-control" placeholder="masukkan email" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Password</label>
                        <input type="password" name="password" class="col-md-8 form-control" placeholder="masukkan password" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Unit</label>
                        <input type="text" name="nama_unit" class="col-md-8 form-control" placeholder="masukkan nama unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Manajer Unit</label>
                        <input type="text" name="manajer_unit" class="col-md-8 form-control" placeholder="masukkan nama manajer unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Staf Unit</label>
                        <input type="text" name="staf_unit" class="col-md-8 form-control" placeholder="masukkan nama staff unit" required>
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
    </div> --}}
    <!-- /.modal -->

    {{-- modal edit --}}
    {{-- <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('unit.update','test')}}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="logo_unit" value="">
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Unit</label>
                        <input type="text" id="nama_unit" name="nama_unit" class="col-md-8 form-control" placeholder="masukkan nama unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Manajer Unit</label>
                        <input type="text" id="manajer_unit" name="manajer_unit" class="col-md-8 form-control" placeholder="masukkan nama manajer unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Staf Unit</label>
                        <input type="text" id="staf_unit" name="staf_unit" class="col-md-8 form-control" placeholder="masukkan nama staff unit" required>
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
    </div> --}}
    <!-- /.modal -->

    {{-- @section('script')
        
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
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    @endsection --}}

</x-app-layout>
