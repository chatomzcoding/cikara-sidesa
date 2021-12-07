@extends('layouts.admin')

@section('title')
    Data Bantuan
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Program Bantuan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Program Bantuan</li>
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
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Program Bantuan Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" class="btn btn-outline-info btn-sm float-right pop-info" data-toggle="modal" data-target="#cetakdokumen" title="Cetak Daftar Bantuan"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  {{-- <section class="text-right my-2">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Data</button>
                  </section> --}}
                  <section class="mb-3">
                      <form action="{{ url('bantuan') }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="sasaran" id="" class="form-control form-control-sm" onchange="this.form.submit();" required>
                                    <option value="semua">-- Pilih Sasaran --</option>
                                    @foreach (list_sasaranbantuan() as $item)
                                        <option value="{{ $item}}" @if ($filter['sasaran'] == $item)
                                            selected
                                        @endif>{{ ucwords($item)}}</option>
                                    @endforeach
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
                                <th>Nama Program</th>
                                <th>Asal Dana</th>
                                <th>Jumlah Peserta</th>
                                <th>Masa Berlaku</th>
                                <th>Sasaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($bantuan as $item)
                            @if ($filter['sasaran'] == 'semua' || ($filter['sasaran'] <> 'semua' AND $filter['sasaran'] == $item->sasaran))
                                <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/bantuan',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  <a class="dropdown-item text-primary" href="{{ url('/bantuan/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Bantuan</a>
                                                    <button type="button" data-toggle="modal" data-sasaran="{{ $item->sasaran }}" data-nama_program="{{ $item->nama_program }}" data-keterangan="{{ $item->keterangan }}" data-asal_dana="{{ $item->asal_dana }}" data-tgl_mulai="{{ $item->tgl_mulai }}" data-tgl_akhir="{{ $item->tgl_akhir }}" data-status="{{ $item->status }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit Bantuan
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nama_program}}</td>
                                    <td>{{ $item->asal_dana}}</td>
                                    <td>-</td>
                                    <td>{{ $item->tgl_mulai.' - '.$item->tgl_akhir}}</td>
                                    <td>{{ $item->sasaran}}</td>
                                    <td class="text-center">{{ $item->status}}</td>
                                </tr>
                            @endif
                            @empty
                                <tr class="text-center">
                                    <td colspan="8">tidak ada data</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="cetakdokumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
                @csrf
                <input type="hidden" name="s" value="bantuan">
            <div class="modal-header">
            <h4 class="modal-title">Informasi Cetak Dokumen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Mengetahui</label>
                        <select name="staf" id="staf" class="form-control col-md-8" required>
                            <option value="">-- Pilih Staf --</option>
                            @foreach (DbCikara::showtable('staf',['status_pegawai','aktif']) as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_pegawai}}</option>
                            @endforeach
                        </select>
                            
                   </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> CETAK SEKARANG</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/bantuan')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Program Bantuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   <div class="form-group row">
                        <label for="" class="col-md-4">Sasaran Program</label>
                        <select name="sasaran" id="sasaran" class="form-control col-md-8">
                            <option value="">-- Pilih Sasaran Program --</option>
                            @foreach (list_sasaranbantuan() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                            
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Program</label>
                        <input type="text" name="nama_program" id="nama_program" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="6" class="form-control col-md-8"></textarea>
                   </div>
                   <div class="form-group row">
                    <label for="" class="col-md-4">Asal Dana</label>
                    <select name="asal_dana" id="asal_dana" class="form-control col-md-8">
                        <option value="">-- Pilih Asal Dana --</option>
                        @foreach (list_asaldana() as $item)
                            <option value="{{ $item}}">{{ $item}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Rentang Waktu Program</label>
                        <div class="col-md-4">
                            <label for="">Tgl Mulai</label>
                            <input type="date" name="tgl_mulai" id="tgl_akhir" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Tgl Akhir</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                        </div>
                   </div>
                   <div class="form-group row">
                    <label for="" class="col-md-4">Status</label>
                    <select name="status" id="status" class="form-control col-md-8">
                        @foreach (list_status() as $item)
                            <option value="{{ $item}}">{{ $item}}</option>
                        @endforeach
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
        </div>
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('bantuan.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Program Bantuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Sasaran Program</label>
                        <select name="sasaran" id="sasaran" class="form-control col-md-8">
                            <option value="">-- Pilih Sasaran Program --</option>
                            @foreach (list_sasaranbantuan() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                            
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Nama Program</label>
                        <input type="text" name="nama_program" id="nama_program" class="form-control col-md-8" required>
                   </div>
                   <div class="form-group row">
                        <label for="" class="col-md-4">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="6" class="form-control col-md-8"></textarea>
                   </div>
                   <div class="form-group row">
                    <label for="" class="col-md-4">Asal Dana</label>
                    <select name="asal_dana" id="asal_dana" class="form-control col-md-8">
                        <option value="">-- Pilih Asal Dana --</option>
                        @foreach (list_asaldana() as $item)
                            <option value="{{ $item}}">{{ $item}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Rentang Waktu Program</label>
                        <div class="col-md-4">
                            <label for="">Tgl Mulai</label>
                            <input type="date" name="tgl_mulai" id="tgl_akhir" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Tgl Akhir</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                        </div>
                   </div>
                   <div class="form-group row">
                    <label for="" class="col-md-4">Status</label>
                    <select name="status" id="status" class="form-control col-md-8">
                        @foreach (list_status() as $item)
                            <option value="{{ $item}}">{{ $item}}</option>
                        @endforeach
                    </select>
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
                var nama_program = button.data('nama_program')
                var sasaran = button.data('sasaran')
                var keterangan = button.data('keterangan')
                var asal_dana = button.data('asal_dana')
                var tgl_mulai = button.data('tgl_mulai')
                var tgl_akhir = button.data('tgl_akhir')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_program').val(nama_program);
                modal.find('.modal-body #sasaran').val(sasaran);
                modal.find('.modal-body #asal_dana').val(asal_dana);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #tgl_mulai').val(tgl_mulai);
                modal.find('.modal-body #tgl_akhir').val(tgl_akhir);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy","excel"]
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

