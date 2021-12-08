@extends('layouts.admin')

@section('title')
    Tambah Pemerintah Desa
@endsection

@section('header')
  <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Pemerintahan Desa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ url('staf')}}">Daftar Pemerintahan Desa</a></li>
          <li class="breadcrumb-item active">Tambah Staf Baru</li>
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
                <a href="{{ url('/staf')}}" class="btn btn-outline-secondary btn-flat btn-sm pop-info" title="Kembali ke daftar Staf"><i class="fas fa-angle-left"></i> Kembali </a>
              </div>
              <div class="card-body">
                  <div class="callout callout-info">
                    Tanda <strong class="text-danger">*</strong> Tidak boleh kosong!
                  </div>
                  <form action="{{ url('/staf')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  @include('sistem.notifikasi')
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nama Pegawai <strong class="text-danger">*</strong></label>
                    <input type="text" name="nama_pegawai" class="form-control col-md-9" value="{{ $penduduk->nama_penduduk }}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor Induk Kependudukan <strong class="text-danger">*</strong></label>
                    <input type="text" name="nik" class="form-control col-md-9" maxlength="16" pattern="[0-9]{16}" value="{{ $penduduk->nik }}" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">NIPD/NIP</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nipd" class="form-control" placeholder="kolom untuk NIPD">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="text" name="nip" class="form-control" placeholder="kolom untuk NIP">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Tempat Tanggal Lahir <strong class="text-danger">*</strong></label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="tempat_lahir" class="form-control" value="{{ $penduduk->tempat_lahir }}" required>
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tgl_lahir" class="form-control" value="{{ $penduduk->tgl_lahir }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Jenis Kelamin <strong class="text-danger">*</strong></label>
                    <select name="jk" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        @foreach (list_jeniskelamin() as $item)
                            <option value="{{ $item }}" @if ($item == $penduduk->jk)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Pendidikan <strong class="text-danger">*</strong></label>
                    <select name="pendidikan" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Pendidikan dalam kk --</option>
                        @foreach (list_pendidikandalamkk() as $item)
                            <option value="{{ $item }}" @if ($item == $penduduk->pendidikan_kk)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Agama <strong class="text-danger">*</strong></label>
                    <select name="agama" id="" class="form-control col-md-9" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach (list_agama() as $item)
                            <option value="{{ $item }}" @if ($item == $penduduk->agama)
                                selected
                            @endif>{{ strtoupper($item)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Pangkat / Golongan <strong class="text-danger">*</strong></label>
                    <input type="text" name="golongan" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor/Tanggal SK Pengangkatan</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nosk_pengangkatan" class="form-control" placeholder="nomor SK Pengangkatan">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tglsk_pengangkatan" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Nomor/Tanggal SK Pemberhentian</label>
                    <div class="col-md-5 p-0">
                      <input type="text" name="nosk_pemberhentian" class="form-control" placeholder="Nomor SK Pemberhentian">
                    </div>
                    <div class="col-md-4 pr-0">
                      <input type="date" name="tglsk_pemberhentian" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Masa Jabatan (usia/periode) <strong class="text-danger">*</strong></label>
                    <input type="text" name="masa_jabatan" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Jabatan <strong class="text-danger">*</strong></label>
                    <input type="text" name="jabatan" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Status Kepegawaian <strong class="text-danger">*</strong></label>
                    <select name="status_pegawai" id="" class="form-control col-md-9" required>
                      <option value="">-- Pilih Status --</option>
                        @foreach (list_status() as $item)
                            <option value="{{ $item }}">{{ $item}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-3 p-2">Photo <strong class="text-danger">*</strong></label>
                    <input type="file" name="photo" class="form-control col-md-9" required>
                  </div>
                  <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> SIMPAN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    {{-- <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url('/rumahtangga')}}" method="post">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data Rumah Tangga Per Penduduk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group">
                        <label for="">Kepala Keluarga (dari penduduk yang tidak memiliki No. KK)</label>
                        <select name="penduduk_id" id="" class="form-control" required>
                            <option value="">-- Silahkan Cari NIK / Nama Kepala Keluarga --</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_penduduk}}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-secondary mt-2">
                            Silakan cari nama / NIK dari data penduduk yang sudah terinput. Penduduk yang dipilih otomatis berstatus sebagai Kepala Rumah Tangga baru tersebut.
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
    </div> --}}
    <!-- /.modal -->

    {{-- modal edit --}}
    {{-- <div class="modal fade" id="ubah">
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
        </div>
    </div> --}}
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

    @endsection

