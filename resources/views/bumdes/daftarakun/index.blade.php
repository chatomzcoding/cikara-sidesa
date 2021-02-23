<x-app-layout>
    @section('title','Bumdes - Daftar Akun')
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Daftar Akun</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Akun</li>
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
                <h3 class="card-title">Daftar Akun</h3>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="text-right my-2">
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#import"><i class="fas fa-file"></i> Import Data</button>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Data</button>
                  </section>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                    <th width="10%">No</th>
                    <th>Kode Akun</th>
                    <th>Nama Akun</th>
                    <th>Pos Saldo</th>
                    <th>Pos Laporan</th>
                    <th>Saldo</th>
                    <th width="15%">Opsi</th>
                </tr>
                </thead>
                <tbody class="text-capitalize">
                    @foreach ($daftarakun as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_akun}}</td>
                            <td>{{ $item->nama_akun}}</td>
                            <td>{{ $item->pos_saldo}}</td>
                            <td>{{ $item->pos_laporan}}</td>
                            <td class="text-right">{{ norupiah($item->saldo_akun)}}</td>
                            <td class="text-center">
                                <form id="data-{{ $item->id }}" action="{{url('/daftarakun',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    </form>
                                  {{-- <a href="{{ url('/cikaradivisi',Crypt::encryptString($item->id))}}" class="btn btn-link btn-success btn-lg"><i class="fas fa-external-link-alt"></i></a> --}}
                                  <button type="button" data-toggle="modal" data-kode_akun="{{ $item->kode_akun }}" data-nama_akun="{{ $item->nama_akun }}" data-pos_saldo="{{ $item->pos_saldo }}" data-pos_laporan="{{ $item->pos_laporan }}" data-saldo_akun="{{ $item->saldo_akun }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button> &nbsp;&nbsp;
                                <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                <tfoot class="text-center">
                    <tr>
                        <th width="10%">No</th>
                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        <th>Pos Saldo</th>
                        <th>Pos Laporan</th>
                        <th>Saldo</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal import --}}
    <div class="modal fade" id="import">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/bumdes/daftarakun/import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Import Daftar Akun</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Masukkan file</label>
                        <input type="file" name="file" class="col-md-8" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> IMPORT</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    </div>
    {{-- modal tambah --}}
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/daftarakun')}}" method="post">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('daftarakun.update','test')}}" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Daftar Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Kode Akun</label>
                        <input type="text" id="kode_akun" name="kode_akun" class="col-md-8 form-control" placeholder="masukkan nama unit" disabled required>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Akun</label>
                        <input type="text" id="nama_akun" name="nama_akun" class="col-md-8 form-control" placeholder="masukkan nama unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Saldo</label>
                        <input type="text" id="rupiah" name="saldo_akun" class="col-md-8 form-control" placeholder="masukkan nama manajer unit" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Pos Saldo</label>
                        <input type="text" id="pos_saldo" name="pos_saldo" class="col-md-8 form-control" placeholder="masukkan nama unit" disabled required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Pos Laporan</label>
                        <input type="text" id="pos_laporan" name="pos_laporan" class="col-md-8 form-control" placeholder="masukkan nama unit" disabled required>
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
                var kode_akun = button.data('kode_akun')
                var nama_akun = button.data('nama_akun')
                var pos_saldo = button.data('pos_saldo')
                var pos_laporan = button.data('pos_laporan')
                var saldo_akun = button.data('saldo_akun')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #kode_akun').val(kode_akun);
                modal.find('.modal-body #nama_akun').val(nama_akun);
                modal.find('.modal-body #pos_saldo').val(pos_saldo);
                modal.find('.modal-body #pos_laporan').val(pos_laporan);
                modal.find('.modal-body #rupiah').val(saldo_akun);
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
