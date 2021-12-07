@extends('layouts.admin')
@section('title')
    Data Dusun
@endsection
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Wilayah Administratif Dusun</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Dusun</li>
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
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Dusun Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                {{-- <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Hapus Data Terpilih</a> --}}
                <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar List Dusun"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Aksi</th>
                                <th>Dusun</th>
                                <th>Kepala Dusun</th>
                                <th>RW</th>
                                <th>KK</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L+P</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($dusun as $item)
                            @php
                                $jumlahlakilaki = DbCikara::jumlahJk('dusun',$item->id,'laki-laki');
                                $jumlahperempuan = DbCikara::jumlahJk('dusun',$item->id,'perempuan');
                                $total          = $jumlahlakilaki + $jumlahperempuan;
                            @endphp
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/dusun',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                            <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                              <a class="dropdown-item text-primary" href="{{ url('/dusun/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Wilayah Dusun</a>
                                                <button type="button" data-toggle="modal" data-nama_dusun="{{ $item->nama_dusun }}" data-nik="{{ $item->nik }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i> Edit Dusun
                                                </button>
                                              <div class="dropdown-divider"></div>
                                              <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->nama_dusun}}</td>
                                    @php
                                        $nama = DbCikara::namapenduduk($item->nik);
                                    @endphp
                                    <td @if ($nama == '-')
                                        class="text-center"
                                    @endif>{{ $nama }}</td>
                                    <td class="text-center">{{ DbCikara::countData('rw',['dusun_id',$item->id]) }}</td>
                                    <td class="text-center">{{ DbCikara::jumlahKK('dusun',$item->id) }}</td>
                                    <td class="text-center">{{ $jumlahlakilaki }}</td>
                                    <td class="text-center">{{ $jumlahperempuan }}</td>
                                    <td class="text-center">{{ $total }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="10">tidak ada data</td>
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
                <input type="hidden" name="s" value="dusun">
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
            <form action="{{ url('/dusun')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Wilayah Administratif Dusun</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Nama Dusun <strong class="text-danger">*</strong></label>
                        <input type="text" name="nama_dusun" class="form-control col-md-8" placeholder="Nama Dusun" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">NIK / Nama Kepala Dusun <strong class="text-danger">*</strong></label>
                        <div class="col-md-8 p-0">
                            <select name="nik" id="nik" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"  aria-hidden="true" required>
                                <option value="">-- Pilih Kepala Dusun --</option>
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->nik}}">{{ ucwords($item->nik.' | '.$item->nama_penduduk)}}</option>
                                @endforeach
                            </select>
                        </div>
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
            <form action="{{ route('dusun.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Wilayah Administratif Dusun</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Dusun</label>
                        <input type="text" name="nama_dusun" id="nama_dusun" class="form-control col-md-8" placeholder="Nama Dusun" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">NIK / Nama Kepala Dusun <strong class="text-danger">*</strong></label>
                        <div class="col-md-8 p-0">
                            <select name="nik" id="nik" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"  aria-hidden="true" required>
                                <option value="">-- Pilih Kepala Dusun --</option>
                                @foreach ($penduduk as $item)
                                    <option value="{{ $item->nik}}">{{ ucwords($item->nik.' | '.$item->nama_penduduk)}}</option>
                                @endforeach
                            </select>
                        </div>
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
                var nama_dusun = button.data('nama_dusun')
                var nik = button.data('nik')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_dusun').val(nama_dusun);
                modal.find('.modal-body #nik').val(nik);
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

