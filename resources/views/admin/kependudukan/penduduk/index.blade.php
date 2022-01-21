@extends('layouts.admin')

@section('title')
    Data Penduduk
    @endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Penduduk @if ($sesi == 'perubahan')
            (penyesuaian penduduk)
        @endif</h1>
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
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Penduduk</span>
                      <span class="info-box-number">
                        {{ $total['penduduk'] }}
                        {{-- <small>%</small> --}}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Terdaftar E-KTP</span>
                      <span class="info-box-number">{{ $total['terdaftar'] }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-tag"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Penduduk Asli</span>
                      <span class="info-box-number">{{ $total['tetap'] }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-minus"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Penduduk Pendatang</span>
                      <span class="info-box-number">{{ $total['pendatang'] }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="{{ url('/penduduk/create')}}" class="btn btn-outline-primary btn-flat btn-sm pop-info" title="Tambah Data Penduduk Baru"><i class="fas fa-plus"></i> Tambah</a>
                <a href="{{ url('/penduduk?data=perubahan')}}" class="btn btn-outline-danger btn-flat btn-sm pop-info" title="Daftar Penduduk dengan data tidak sesuai"><i class="fas fa-user-times"></i> Data belum sesuai</a>
                <a href="{{ url('/penduduk?data=aduan')}}" class="btn btn-outline-danger btn-flat btn-sm pop-info" title="Daftar Pengaduan Kelengkapan Data Penduduk"><i class="fas fa-user-clock"></i> Pengaduan Data</a>
                <a href="{{ url('/penduduk')}}" class="btn btn-outline-dark btn-flat btn-sm pop-info" title="kembali ke daftar awal"><i class="fas fa-sync"></i> Bersihkan Filter</a>
                <div class="float-right">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-flat btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-import"></i> Import Data
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#" data-target="#import" data-toggle="modal">Data Lengkap</a>
                          <a class="dropdown-item" href="#" data-target="#importsimple" data-toggle="modal">Data Mudah</a>
                          <a class="dropdown-item" href="#" data-target="#importpenyesuaian" data-toggle="modal">Data Penyesuaian</a>
                          <a class="dropdown-item" href="#" data-target="#importprodeskel" data-toggle="modal">Data Prodeskel</a>
                        </div>
                        <a href="{{ url('cetakdata?s=penduduk&status_penduduk='.$filter['status_penduduk'].'&jk='.$filter['jk'].'&dusun='.$filter['dusun']) }}" target="_blank" class="btn btn-outline-info btn-flat btn-sm pop-info" title="Cetak Daftar Penduduk"><i class="fas fa-print"></i> CETAK</a>
                      </div>

                </div>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  @if ($sesi == 'cari')
                  <section class="alert alert-info my-2 font-italic">
                      Pencarian dengan keywords : <strong>{{ $_GET['cari'] }}</strong> (total data : {{ count($penduduk) }})
                  </section>
                  @endif
                  <section class="mb-3">
                      <form action="{{ url('penduduk') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <select name="status_penduduk" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua">-- Semua Status Penduduk --</option>
                                    @foreach (list_statuspenduduk() as $item)
                                        <option value="{{ $item}}" @if ($filter['status_penduduk'] == $item)
                                            selected
                                        @endif>{{ strtoupper($item) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select name="jk" id="" class="form-control form-control-sm" onchange="this.form.submit();">
                                    <option value="semua">-- Semua Jenis Kelamin --</option>
                                    <option value="laki-laki" @if ($filter['jk'] == 'laki-laki')
                                    selected
                                @endif>Laki - laki</option>
                                    <option value="perempuan" @if ($filter['jk'] == 'perempuan')
                                    selected
                                @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select name="dusun" id="" class="form-control form-control-sm" onchange="this.form.submit()">
                                    <option value="semua">-- Semua Dusun --</option>
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
                        @if ($page)
                            <table id="example1" class="table table-bordered table-striped">
                        @else
                            <table id="datanormal" class="table table-bordered table-striped">
                        @endif
                        <thead class="text-center">
                            @if ($sesi == 'perubahan')
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th width="20%">INFO</th>
                                    <th>Nama Penduduk</th>
                                    <th>Data Penduduk</th>
                                </tr>
                            @else
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Aksi</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Nama Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Dusun</th>
                                    <th>RW</th>
                                    <th>RT</th>
                                    <th>Pendidikan dalam KK</th>
                                    <th>Pekerjaan</th>
                                    <th>Kawin</th>
                                    <th>Status Penduduk</th>
                                    <th>Tanggal Input</th>
                                </tr>
                            @endif
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($penduduk as $item)
                            @php
                            $rt     = DbCikara::showtablefirst('rt',['id',$item->rt_id]);
                            $rw     = DbCikara::showtablefirst('rw',['id',$rt->rw_id]);
                            $dusun  = DbCikara::showtablefirst('dusun',['id',$rw->dusun_id]);
                        @endphp
                                @if ($sesi == 'perubahan')
                                <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/penduduk',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                            <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item text-success" href="{{ url('/penduduk/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Ubah Biodata Penduduk</a>
                                            <a class="dropdown-item text-primary" href="{{ url('penduduk/'.Crypt::encryptString($item->id)) }}"><i class="fas fa-user"></i> Detail Penduduk</a>
                                            <div class="dropdown-divider"></div>
                                            <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="small text-danger">
                                        @if ($item->nik < 999999999999999)
                                            - NIK kurang dari 16 digit <br>
                                        @endif
                                        @if ($item->nik_ayah < 999999999999999)
                                            - NIK Ayah kurang dari 16 digit <br>
                                        @endif
                                        @if ($item->nik_ibu < 999999999999999)
                                            - NIK Ibu kurang dari 16 digit <br>
                                        @endif
                                        @if ($item->tgl_lahir == '2222-01-01')
                                            - Tanggal lahir belum sesuai <br>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->nama_penduduk}}

                                    </td>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <th>NIK</th>
                                                <td>
                                                    {{ $item->nik}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>NIK Ayah</th>
                                                <td>
                                                    {{ $item->nik_ayah}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>NIK Ibu</th>
                                                <td>
                                                    {{ $item->nik_ibu}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>
                                                    {{ $item->jk}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>
                                                    {{ $item->tgl_lahir}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status Perkawinan</th>
                                                <td>
                                                    {{ $item->status_perkawinan}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status Penduduk</th>
                                                <td>{{ $item->status_penduduk }}</td>
                                            </tr>
                                        </table>
                                </tr>
                                @else
                                @php
                                    $rt     = DbCikara::showtablefirst('rt',['id',$item->rt_id]);
                                    $rw     = DbCikara::showtablefirst('rw',['id',$rt->rw_id]);
                                    $dusun  = DbCikara::showtablefirst('dusun',['id',$rw->dusun_id]);
                                @endphp
                                @if (filter_data_get($filter,[$item->status_penduduk,$item->jk,$dusun->id]))
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('/penduduk',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item text-success" href="{{ url('/penduduk/'.Crypt::encryptString($item->id).'/edit')}}"><i class="fas fa-pen"></i> Ubah Biodata Penduduk</a>
                                                <a class="dropdown-item text-primary" href="{{ url('penduduk/'.Crypt::encryptString($item->id)) }}"><i class="fas fa-user"></i> Detail Penduduk</a>
                                                <div class="dropdown-divider"></div>
                                                <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->nik}}</td>
                                        <td>{{ $item->nama_penduduk}}</td>
                                        <td>{{ $item->nama_ayah}}</td>
                                        <td>{{ $item->nama_ibu}}</td>
                                        <td>{{ $item->jk}}</td>
                                        <td>{{ $item->tgl_lahir}}</td>
                                        <td>{{ $item->alamat_sekarang}}</td>
                                        <td>{{ $dusun->nama_dusun }}</td>
                                        <td>{{ $rw->nama_rw }}</td>
                                        <td>{{ $rt->nama_rt }}</td>
                                        <td>{{ $item->pendidikan_kk}}</td>
                                        <td>{{ $item->pekerjaan}}</td>
                                        <td>{{ $item->status_perkawinan}}</td>
                                        <td>{{ $item->status_penduduk }}</td>
                                        <td>{{ $item->created_at}}</td>
                                    </tr>
                                @endif
                                
                                @endif
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">belum ada data</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
                @if ($page)
                {{ $penduduk->links('vendor.pagination.bootstrap-4') }}
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}

    <div class="modal fade" id="importprodeskel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/prodeskel')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Dari Aplikasi Prodeskel</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Penyesuaian adalah cara import data penduduk dari file excel dengan tujuan penyesuaian data penduduk, data akan diperbaharui berdasarkan NIK penduduk, apabila NIK belum ada maka akan menambahkan data baru. <strong>Metode ini akan memperbaharui data penduduk secara serentak, perhatikan nomor NIK agar sesuai dengan data penduduk !</strong></p>
                        <strong>Contoh Format Excel Prodeskel</strong> <a href="{{ asset('file/format_penduduk_simple.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
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
    <div class="modal fade" id="importpenyesuaian">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/import/pendudukpenyesuaian')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Import Data Penyesuaian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Penyesuaian adalah cara import data penduduk dari file excel dengan tujuan penyesuaian data penduduk, data akan diperbaharui berdasarkan NIK penduduk, apabila NIK belum ada maka akan menambahkan data baru. <strong>gunakan metode ini jika ingin memperbaharui data penduduk secara serentak, perhatikan nomor NIK agar sesuai dengan data penduduk !</strong></p>
                        <strong>Download Format Import Penduduk Penyesuaian</strong> <a href="{{ asset('file/format_penduduk_simple.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
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
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Mudah adalah cara import data penduduk dari file excel dengan kolom isian hanya biodata penting penduduk seperti yang tertuang dalam KTP, data sisanya dapat diedit sesuai dengan kebutuhan penduduk. <strong>gunakan metode ini jika data penduduk kurang lengkap !</strong></p>
                        <strong>Download Format Import Penduduk Mudah</strong> <a href="{{ asset('file/format_penduduk_simple.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <input type="file" name="file" class="form-control col-md-8" required>
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
                    <div class="callout callout-success">
                        <p><i class="fas fa-bullhorn"></i> Informasi</p>
                        <p>Metode Lengkap adalah cara import data penduduk dari file excel dengan kolom isian yang lengkap dimulai dari biodata penduduk, anggota keluarga, kewarganegaraan, perkawinan, kesehatan dan data lainnya. <strong>gunakan metode ini jika data penduduk lengkap !</strong></p>
                        <strong>Download Format Import Penduduk Lengkap </strong> <a href="{{ asset('file/format_import_penduduk.xlsx') }}">Klik Disini</a>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Upload File</label>
                        <div class="col-md-8 p-0">
                            <input type="file" name="file" class="form-control col-md-8" required>
                            <span class="text-danger">file berformat excel .xlsx</span>
                        </div>
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
            $("#datanormal").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                "paging": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
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
