<x-app-layout>
    @section('title')
        Bumdes - Laporan
    @endsection
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Laporan</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Laporan</h3>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="text-right my-2">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Laporan</button>
                  </section>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                    <th width="10%">No</th>
                    <th>Periode</th>
                    <th>Tanggal Pembuatan laporan</th>
                    <th>Status Laporan</th>
                    <th width="15%">Opsi</th>
                </tr>
                </thead>
                <tbody class="text-capitalize">
                    @foreach ($laporan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td>{{ $item->bulan.' '.$item->tahun}}</td>
                            <td>{{ $item->created_at}}</td>
                            <td class="text-center">{{ $item->status_laporan}}</td>
                            <td class="text-center">
                                <form id="data-{{ $item->id }}" action="{{url('/laporan',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                  {{-- <a href="{{ url('/cikaradivisi',Crypt::encryptString($item->id))}}" class="btn btn-link btn-success btn-lg"><i class="fas fa-external-link-alt"></i></a> --}}
                                  <button type="button" data-toggle="modal" data-nama_unit="{{ $item->nama_unit }}" data-manajer_unit="{{ $item->manajer_unit }}" data-staf_unit="{{ $item->staf_unit }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button> &nbsp;&nbsp;
                                <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                <tfoot class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Unit</th>
                        <th>Manajer Unit</th>
                        <th>Staf Unit</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/laporan')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id}}">
                <input type="hidden" name="status_laporan" value="proses">
            <div class="modal-header">
            <h4 class="modal-title">Form Tambah Laporan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Laporan Bulan</label>
                        <select name="bulan" id="" class="form-control col-md-8">
                            @foreach (daftar_bulan() as $id => $nama_bulan)
                                <option value="{{ $nama_bulan}}">{{ $nama_bulan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Laporan Tahun</label>
                        <select name="tahun" id="" class="form-control col-md-8">
                            @for ($i = 2020; $i <= ambil_tahun(); $i++)
                                <option value="{{ $i}}">{{ $i}}</option>
                            @endfor
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @section('script')
        
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
    @endsection

</x-app-layout>
