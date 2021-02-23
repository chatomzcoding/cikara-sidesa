<x-app-layout>
    @section('title','Bumdes - Daftar Akun Pembantu')
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Daftar Akun Pembantu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Akun Pembantu</li>
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
                <h3 class="card-title">Daftar Akun Pembantu</h3>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="text-right my-2">
                      {{-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#import"><i class="fas fa-file"></i> Import Data</button> --}}
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Data</button>
                  </section>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                    <th width="10%">No</th>
                    <th>Kode Bantu</th>
                    <th>Nama Akun</th>
                    <th>Status</th>
                    <th>Saldo</th>
                    <th width="15%">Opsi</th>
                </tr>
                </thead>
                <tbody class="text-capitalize">
                    @foreach ($daftarakunpembantu as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_bantu}}</td>
                            <td>{{ $item->nama_akun}}</td>
                            <td>{{ $item->status}}</td>
                            <td class="text-right">{{ norupiah($item->saldo_akunpembantu)}}</td>
                            <td class="text-center">
                                <form id="data-{{ $item->id }}" action="{{url('/daftarakunpembantu',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    </form>
                                  {{-- <a href="{{ url('/cikaradivisi',Crypt::encryptString($item->id))}}" class="btn btn-link btn-success btn-lg"><i class="fas fa-external-link-alt"></i></a> --}}
                                  <button type="button" data-toggle="modal" data-kode_bantu="{{ $item->kode_bantu }}" data-nama_akun="{{ $item->nama_akun }}" data-status="{{ $item->status }}" data-saldo_akunpembantu="{{ $item->saldo_akunpembantu }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button> &nbsp;&nbsp;
                                <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                <tfoot class="text-center">
                    <tr>
                        <th width="10%">No</th>
                        <th>Kode Bantu</th>
                        <th>Nama Akun</th>
                        <th>Status</th>
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
            <form action="{{ url('/daftarakunpembantu')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Form Tambah Akun Pembantu</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Kode Bantu</label>
                        <input type="text" name="kode_bantu" class="col-md-8 form-control" placeholder="masukkan kode bantu" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Akun</label>
                        <input type="text" name="nama_akun" class="col-md-8 form-control" placeholder="masukkan nama akun" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Status Akun</label>
                        <select name="status" id="status" class="form-control col-md-8">
                            <option value="hutang">Hutang</option>
                            <option value="piutang">Piutang</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Saldo Akun Pembantu</label>
                        <input type="text" id="rupiah" name="saldo_akunpembantu" class="col-md-8 form-control" required>
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
            <form action="{{ route('daftarakunpembantu.update','test')}}" method="post">
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
                        <label for="" class="col-md-4 p-2">Kode Bantu</label>
                        <input type="text" id="kode_bantu" name="kode_bantu" class="col-md-8 form-control" placeholder="masukkan kode bantu" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Akun</label>
                        <input type="text" id="nama_akun" name="nama_akun" class="col-md-8 form-control" placeholder="masukkan nama akun" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Status Akun</label>
                        <select name="status" id="status" class="form-control col-md-8">
                            <option value="hutang">Hutang</option>
                            <option value="piutang">Piutang</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Saldo Akun Pembantu</label>
                        <input type="text" id="rupiah1" name="saldo_akunpembantu" class="col-md-8 form-control" required>
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
                var kode_bantu = button.data('kode_bantu')
                var nama_akun = button.data('nama_akun')
                var status = button.data('status')
                var saldo_akunpembantu = button.data('saldo_akunpembantu')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #kode_bantu').val(kode_bantu);
                modal.find('.modal-body #nama_akun').val(nama_akun);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #rupiah1').val(saldo_akunpembantu);
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
