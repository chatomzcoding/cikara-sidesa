@extends('layouts.admin')

@section('title')
    Data Penduduk
    @endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Pengaduan Kelengkapan Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('penduduk')}}">Daftar Penduduk</a></li>
            <li class="breadcrumb-item active">Data Pengaduan</li>
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
                <a href="{{ url('/penduduk')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Penduduk"><i class="fas fa-angle-left"></i> Kembali</a>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="5%">Aksi</th>
                                <th>Nama Penduduk</th>
                                <th>Data Pengaduan</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($user as $item)
                                @php
                                    $penduduk = DB::table('penduduk')
                                                ->join('user_akses','penduduk.id','=','user_akses.penduduk_id')
                                                ->select('penduduk.*')
                                                ->where('user_akses.user_id',$item->user_id)
                                                ->first();
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td>
                                        <form id="data-{{ $penduduk->id }}" action="{{url('/pendudukaduan',$penduduk->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                            <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item text-success" href="{{ url('/penduduk/'.Crypt::encryptString($penduduk->id).'/edit')}}"><i class="fas fa-pen"></i> Perbaiki Data</a>
                                            <a class="dropdown-item text-primary" href="{{ url('penduduk/'.Crypt::encryptString($penduduk->id)) }}"><i class="fas fa-user"></i> Detail Penduduk</a>
                                            <div class="dropdown-divider"></div>
                                            <button onclick="deleteRow( {{ $penduduk->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $penduduk->nama_penduduk }} <br> {{ $penduduk->nik }}</td>
                                    <td class="text-center">
                                        @php
                                            $aduan = DB::table('penduduk_aduan')
                                                        ->where('user_id',$item->user_id)
                                                        ->get();
                                        @endphp 
                                        <table class="table">
                                            <tr>
                                                <td width="5%">Aksi</td>
                                                <td width="20%">Tanggal Aduan</td>
                                                <td>Data</td>
                                                <td>Data Awal</td>
                                                <td>Data Pengaduan</td>
                                            </tr>
                                            @foreach ($aduan as $row)
                                                @php
                                                    $dawal = 'type data tidak ada';
                                                    $key = $row->key; 
                                                @endphp
                                                @if (isset($penduduk->$key))
                                                    @php
                                                        $dawal = $penduduk->$key;
                                                    @endphp
                                                @endif
                                        </td>
                                                <tr>
                                                    <td>
                                                        <form id="data-{{ $row->id }}" action="{{url('/pendudukaduan',$row->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            </form>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                            <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">
                                                            <button type="button" data-toggle="modal" data-key="{{ ubahdatakey($row->key) }}" data-isi="{{ $row->isi }}" data-awal="{{ $dawal }}"  data-sesi="{{ $item->key }}"  data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i> Edit Data
                                                                </button>
                                                            <div class="dropdown-divider"></div>
                                                            <button onclick="deleteRow( {{ $row->id }} )" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td>{{ ubahdatakey($row->key) }}</td>
                                                    <td>
                                                        {{ $dawal }}
                                                    </td>
                                                    <td class="text-danger">
                                                       {{ $row->isi }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                       
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">belum ada data</td>
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

  {{-- modal edit --}}
  <div class="modal fade" id="ubah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('pendudukaduan.update','test')}}" method="post">
            @csrf
            @method('patch')
        <div class="modal-header">
        <h4 class="modal-title">Perbaiki Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body p-3">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="status" id="selesai">
            <section class="p-3">
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2">Data</label>
                    <input type="text" name="key" id="key" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2">Data Awal</label>
                    <input type="text" name="isi" id="awal" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 p-2">Data Pengaduan</label>
                    <input type="text" name="isi" id="isi" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group row tanggal" id="tgl" style="display: none;">
                    <label for="" class="col-md-4 p-2">Tanggal</label>
                    <input type="date" name="databaru" class="form-control col-md-8" required>
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
            var key = button.data('key')
            var isi = button.data('isi')
            var awal = button.data('awal')
            var sesi = button.data('sesi')
            var id = button.data('id')
    
            var modal = $(this)
            switch (sesi) {
                case 'tgl_lahir':
                    $(".tanggal").show();
                    break;
            
                default:
                    break;
            }
            modal.find('.modal-body #isi').val(isi);
            modal.find('.modal-body #key').val(key);
            modal.find('.modal-body #awal').val(awal);
            modal.find('.modal-body #id').val(id);
        })
    </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false,
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
