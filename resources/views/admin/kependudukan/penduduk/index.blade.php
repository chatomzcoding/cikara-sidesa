@extends('layouts.admin')

@section('title')
    Data Penduduk
    @endsection

@section('header')
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
                <a href="{{ url('/penduduk/create')}}" class="btn btn-outline-primary btn-flat btn-sm"><i class="fas fa-plus"></i> Penduduk Domisili</a>
                <div class="float-right">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-flat btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-import"></i> Import Data
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#" data-target="#import" data-toggle="modal">Data Lengkap</a>
                          <a class="dropdown-item" href="#" data-target="#importsimple" data-toggle="modal">Data Simple</a>
                        </div>
                        <a href="{{ url('cetak/list/penduduk') }}" target="_blank" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> CETAK</a>
                      </div>

                </div>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  {{-- <section class="text-right my-2">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Data</button>
                  </section> --}}
                  <section class="mb-3">
                      <form action="{{ url('penduduk') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="status_penduduk" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua">-- Status Penduduk --</option>
                                    @foreach (list_statuspenduduk() as $item)
                                        <option value="{{ $item}}" @if ($filter['status_penduduk'] == $item)
                                            selected
                                        @endif>{{ strtoupper($item) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="jk" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua" @if ($filter['jk'] == 'semua')
                                    selected
                                @endif>-- Jenis Kelamin --</option>
                                    <option value="laki-laki" @if ($filter['jk'] == 'laki-laki')
                                    selected
                                @endif>Laki - laki</option>
                                    <option value="perempuan" @if ($filter['jk'] == 'perempuan')
                                    selected
                                @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select name="dusun" id="" class="form-control form-control-sm" onchange="this.form.submit()">
                                    <option value="semua">-- Dusun --</option>
                                    @foreach (DbCikara::showtable('dusun') as $item)
                                        <option value="{{ $item->id }}" @if ($filter['dusun'] == $item->id)
                                            selected
                                        @endif>{{ $item->nama_dusun }}</option>
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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No. KK</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Dusun</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Pendidikan dalam KK</th>
                                <th>Umur</th>
                                <th>Pekerjaan</th>
                                <th>Kawin</th>
                                <th>Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($penduduk as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td class="text-center">
                                    <form id="data-{{ $item->id }}" action="{{url('/penduduk',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        </form>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-flat">Aksi</button>
                                        <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                          <a class="dropdown-item" href="{{ url('/penduduk/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Ubah Biodata Penduduk</a>
                                          <a class="dropdown-item" href="{{ url('penduduk/'.Crypt::encryptString($item->id)) }}"><i class="fas fa-user"></i> Detail Penduduk</a>
                                          <div class="dropdown-divider"></div>
                                          <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                        </div>
                                      </div>
                                </td>
                                <td>{{ $item->nik}}</td>
                                <td>{{ $item->nama_penduduk}}</td>
                                <td>{{ $item->kk_sebelum}}</td>
                                <td>{{ $item->nama_ayah}}</td>
                                <td>{{ $item->nama_ibu}}</td>
                                <td>{{ $item->jk}}</td>
                                <td>{{ $item->alamat_sekarang}}</td>
                                @php
                                    $rt     = DbCikara::showtablefirst('rt',['id',$item->rt_id]);
                                    $rw     = DbCikara::showtablefirst('rw',['id',$rt->rw_id]);
                                    $dusun  = DbCikara::showtablefirst('dusun',['id',$rw->dusun_id]);
                                @endphp
                                <td>{{ $dusun->nama_dusun }}</td>
                                <td>{{ $rw->nama_rw }}</td>
                                <td>{{ $rt->nama_rt }}</td>
                                <td>{{ $item->pendidikan_kk}}</td>
                                <td>umur</td>
                                <td>{{ $item->pekerjaan}}</td>
                                <td>{{ $item->status_perkawinan}}</td>
                                <td>{{ $item->created_at}}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">belum ada data</td>
                                </tr>
                            @endforelse
                        {{-- <tfoot class="text-center">
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
                        </tfoot> --}}
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}

    <div class="modal fade" id="importsimple">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/penduduksimple')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Metode Mudah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
                    </div>
                    <div class="alert alert-success">
                        <p>Metode mudah digunakan untuk menambahkan data penting penduduk, sisanya bisa disesuaikan di menu edit penduduk</p>
                        <strong>Download Format Import Penduduk Mudah</strong> <a href="{{ asset('file/format_penduduk_simple.xlsx') }}">Klik Disini</a>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> IMPORT</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="import">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/penduduk')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Metode Lengkap</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
                    </div>
                    <div class="alert alert-success">
                        <strong>Download Format Import Penduduk Lengkap </strong> <a href="{{ asset('file/format_import_penduduk.xlsx') }}">Klik Disini</a>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> IMPORT</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    


    @section('script')
        
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": true,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
