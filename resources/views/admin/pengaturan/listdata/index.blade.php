@extends('layouts.admin')

@section('title')
    Data List
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar List</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('container')
    

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
                      <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                                <div class="list-group">
                                    @foreach (list_datainput() as $item)
                                        <a href="{{ url('listdata?sesi='.$item) }}" class="list-group-item list-group-item-action   @if ($item == $filter['sesi'])
                                        active
                                        @endif">
                                        {{ strtoupper($item) }}
                                        </a>
                                    @endforeach
                                  </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="card">
                            <div class="card-body">
                                <section class="mb-1">
                                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data List" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah List {{ ucwords($filter['sesi']) }}</a>
                                    <span class="float-right badge badge-info p-2">TOTAL DATA {{ count($listdata) }}</span>
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
                                                        <form id="data-{{ $item->id }}" action="{{url('/listdata/'.$item->id.'?page='.$filter['sesi'])}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            </form>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu" role="menu">
                                                                    <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-keterangan="{{ $item->keterangan }}"  data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                                    <i class="fa fa-edit"></i> Edit Teks
                                                                    </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td>{{ $item->nama}}</td>
                                                    <td>{{ $item->keterangan}}
                                                        {{-- <br> --}}
                                                        {{-- {!! DbCikara::showlog(['sesi'=>'teksberjalan','id'=>$item->id]) !!} --}}
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
    {{-- modal --}}
    {{-- @include('sistem.view.modal-log') --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/listdata')}}" method="post">
                @csrf
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
                        <input type="text" name="label" id="label" value="{{ $filter['sesi'] }}" class="form-control col-md-8" readonly>
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
    <!-- /.modal -->

    {{-- modal edit --}}
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
    <!-- /.modal -->

    @section('script')
        
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
    @endsection

    @endsection

