@extends('layouts.admin')

@section('title')
    Detail Dusun
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Wilayah Administratif RW</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dusun')}}">Daftar Dusun</a></li>
            <li class="breadcrumb-item active">Daftar RW</li>
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
                <a href="{{ url('/dusun')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Dusun"><i class="fas fa-angle-left"></i> Kembali</a>
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data RW" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" data-toggle="modal" data-target="#cetakdokumen" class="btn btn-outline-info btn-flat btn-sm float-right pop-info" title="Cetak Daftar Rukun Warga (RW)"><i class="fas fa-print"></i> CETAK</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <h4>{{ $dusun->nama_dusun}}</h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Aksi</th>
                                <th>RW</th>
                                <th>Ketua RW</th>
                                <th>NIK Ketua RW</th>
                                <th>RT</th>
                                <th>KK</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L+P</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($rw as $item)
                            @php
                                $jumlahlakilaki = DbCikara::jumlahJk('rw',$item->id,'laki-laki');
                                $jumlahperempuan = DbCikara::jumlahJk('rw',$item->id,'perempuan');
                                $total          = $jumlahlakilaki + $jumlahperempuan;
                            @endphp
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/rw',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                  <a class="dropdown-item text-primary" href="{{ url('/rw/'.Crypt::encryptString($item->id))}}"><i class="fas fa-list"></i> Detail Wilayah RW</a>
                                                    <button type="button" data-toggle="modal" data-nama_rw="{{ $item->nama_rw }}" data-nik="{{ $item->nik }}" data-dusun_id="{{ $item->dusun_id }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i> Edit RW
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nama_rw}}</td>
                                    @php
                                        $center = ($item->nik == '-') ? 'text-center' : NULL; 
                                    @endphp
                                    <td class="{{ $center }}">{{ DbCikara::namapenduduk($item->nik)}}</td>
                                    <td class="{{ $center }}">{{ $item->nik}}</td>
                                    <td class="text-center">{{ DbCikara::countData('rt',['rw_id',$item->id]) }}</td>
                                    <td class="text-center">{{ DbCikara::jumlahKK('rw',$item->id) }}</td>
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
    <div class="modal fade" id="cetakdokumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form target="_blank" action="{{ url('/cetakdata')}}" method="get">
                @csrf
                <input type="hidden" name="s" value="listrw">
                <input type="hidden" name="id" value="{{ $dusun->id }}">
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
                            <option value="{{ $item->id}}">{{ strtoupper($item->nama_pegawai.' | '.$item->jabatan)}}</option>
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
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/rw')}}" method="post">
                @csrf
                <input type="hidden" name="dusun_id" value="{{ $dusun->id}}">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Wilayah Administratif RW</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama RW</label>
                        <input type="text" name="nama_rw" id="nama_rw" class="form-control col-md-8" placeholder="Nama RW" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">NIK / Nama Ketua RW</label>
                        <select name="nik" id="nik" class="form-control col-md-8">
                            <option value="">-- Pilih Ketua RW --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->nik}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
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
            <form action="{{ route('rw.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Wilayah Administratif RW</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="dusun_id" id="dusun_id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama RW</label>
                        <input type="text" name="nama_rw" id="nama_rw" class="form-control col-md-8" placeholder="Nama RW" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">NIK / Nama Ketua RW</label>
                        <select name="nik" id="nik" class="form-control col-md-8">
                            <option value="">-- Pilih Ketua RW --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->nik}}">{{ $item->nik.' | '.$item->nama_penduduk}}</option>
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
                var nama_rw = button.data('nama_rw')
                var dusun_id = button.data('dusun_id')
                var nik = button.data('nik')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #dusun_id').val(dusun_id);
                modal.find('.modal-body #nama_rw').val(nama_rw);
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

